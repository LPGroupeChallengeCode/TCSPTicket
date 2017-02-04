var express       = require('express');        // call express
var bodyParser    = require('body-parser');
var md5           = require('md5');
var nodemailer    = require('nodemailer');
var smtpTransport = require('nodemailer-smtp-transport');
var paypal        = require('paypal-rest-sdk');
var qr            = require('qr-image');
var mongoose      = require('mongoose');

module.exports = function(app) {
	
	//formulaire de contact
	app.post("/contact", function(req, res){

		var options = {
			service : 'Gmail',
			auth : {
				user : "contact.billeterie.tcsp@gmail.com",
				pass : "TCSPtickets"
			}
		};

		var transporter = nodemailer.createTransport(smtpTransport(options));

		var mailOptions = {
			from : req.body.prenom + ' ' + req.body.nom + '<' + req.body.email + '>',
			to : '<contact.billeterie.tcsp@gmail.com>',
			subject : req.body.mailObject,
			text : req.body.mailContent,
			html : '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <title></title> <meta name="viewport" content="width=device-width" /><style type="text/css"> @media only screen and (min-width: 620px){.wrapper{min-width:600px !important}.wrapper h1{}.wrapper h1{font-size:40px !important;line-height:47px !important}.wrapper h2{}.wrapper h2{font-size:24px !important;line-height:32px !important}.wrapper h3{}.wrapper h3{font-size:20px !important;line-height:28px !important}.column{}} </style> <style type="text/css"> body {margin: 0; padding: 0; } table {border-collapse: collapse; table-layout: fixed; } * {line-height: inherit; } .preheader, .header, .layout, .column {transition: width 0.25s ease-in-out, max-width 0.25s ease-in-out; } .layout, div.header {max-width: 400px !important; -fallback-width: 95% !important; width: calc(100% - 20px) !important; } div.preheader {max-width: 360px !important; -fallback-width: 90% !important; width: calc(100% - 60px) !important; } .snippet, .webversion {Float: none !important; } .column {max-width: 400px !important; width: 100% !important; } .snippet, .webversion {width: 50% !important; } @media only screen and (min-width: 620px) {.column, .gutter {display: table-cell; Float: none !important; vertical-align: top; } div.preheader, .email-footer {max-width: 560px !important; width: 560px !important; } .snippet, .webversion {width: 280px !important; } div.header, .layout, .one-col .column {max-width: 600px !important; width: 600px !important; } .three-col .column, .column.narrow {max-width: 200px !important; width: 200px !important; } .column.wide {width: 400px !important; } } @media (max-width: 321px) {.layout, .column {min-width: 320px !important; width: 320px !important; } } </style> <!--[if !mso]><!--><style type="text/css"> @import url(https://fonts.googleapis.com/css?family=Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400|Roboto:400,700,400italic,700italic); </style><link href="https://fonts.googleapis.com/css?family=Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400|Roboto:400,700,400italic,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css"> body{background-color:#f5f7fa} </style><meta name="robots" content="noindex,nofollow" /> <meta property="og:title" content="My First Campaign" /> </head> <!--[if mso]> <body class="mso"> <![endif]--> <!--[if !mso]><!--> <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;"> <!--<![endif]--> <table class="wrapper" style="border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #f5f7fa;" cellpadding="0" cellspacing="0" role="presentation"><tbody><tr><td> <div role="banner"> <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000% - 167440px);"> <div style="border-collapse: collapse;display: table;width: 100%;"> <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 280px" valign="top"><![endif]--> <div class="snippet" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #b9b9b9;font-family: "Open Sans",sans-serif;"> </div> <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]--> <div class="webversion" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #b9b9b9;font-family: "Open Sans",sans-serif;"> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);" id="emb-email-header-container"> <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 600px"><![endif]--> <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 10px;Margin-bottom: 20px;color: #5c91ad;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center"> <div class="logo-center" style="font-size:26px !important;line-height:32px !important;" align="center" id="emb-email-header">Billetterie TCSP Martinique</div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div role="section"> <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;"> <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #307fb0;"> <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" style="background-color: #307fb0;"><td style="width: 600px" class="w560"><![endif]--> <div class="column" style="text-align: left;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;"> <div style="line-height:20px;font-size:1px">&nbsp;</div> </div> <div style="Margin-left: 20px;Margin-right: 20px;"> <h1 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #44a8c7;font-size: 32px;line-height: 40px;font-family: Cabin,Avenir,sans-serif;text-align: center;"><strong><span style="color:#ffffff">Contact</span></strong></h1><h3 style="Margin-top: 20px;Margin-bottom: 12px;font-style: normal;font-weight: normal;color: #44a8c7;font-size: 17px;line-height: 26px;text-align: center;"><span style="color:#ffffff">Un utilisateur &#224; besoin de vous !</span></h3> </div> <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;"> <div style="line-height:12px;font-size:1px">&nbsp;</div> </div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;"> <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;" emb-background-style> <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]--> <div class="column" style="text-align: left;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;"> <div style="line-height:10px;font-size:1px">&nbsp;</div> </div> <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;"> <h2 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #44a8c7;font-size: 20px;line-height: 28px;text-align: center;"><strong>' + req.body.mailObject + '</strong></h2><p class="size-16" style="Margin-top: 16px;Margin-bottom: 0;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16">DE : ' + req.body.nom + ' ' + req.body.prenom + ' - ' + req.body.email + '</p><p class="size-16" style="Margin-top: 20px;Margin-bottom: 0;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16">Message : ' +  req.body.mailContent + '</p> </div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div role="contentinfo"> <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;"> <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;"> <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]--> <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #b9b9b9;font-family: "Open Sans",sans-serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;"> <div style="font-size: 12px;line-height: 19px;"> <div>Billetterie TCSP Martinique</div> </div> <div style="font-size: 12px;line-height: 19px;Margin-top: 18px;"> </div> </div> </div> <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]--> <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #b9b9b9;font-family: "Open Sans",sans-serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;"> </div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div class="layout one-col email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;"> <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;"> <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 600px;" class="w560"><![endif]--> <div class="column" style="text-align: left;font-size: 12px;line-height: 19px;color: #b9b9b9;font-family: "Open Sans",sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;"> <div style="font-size: 12px;line-height: 19px;"> <unsubscribe style="text-decoration: underline;">Se d&#233;sinscrire</unsubscribe> </div> </div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> </div> <div style="line-height:40px;font-size:40px;">&nbsp;</div> </div></td></tr></tbody></table> </body></html>'
		}

		transporter.sendMail(mailOptions, function(error, info){
			if(error){
				return console.log(error.message);
			}
			else
			{
				res.writeHead(302, { 
					'Location': 'localhost:8888/BilletterieTCSP/index.php'
				});                    
				res.end();
			}
		});
	});

	//mail mot de passe oublié
	app.post("/resetMdp", function(req, res){

		var options = {
			service : 'Gmail',
			auth : {
				user : "contact.billeterie.tcsp@gmail.com",
				pass : "TCSPtickets"
			}
		};

		var transporter = nodemailer.createTransport(smtpTransport(options));

		var mailOptions = {
			from : 'Billetterie TCSP Martinique <contact.billeterie.tcsp@gmail.com>',
			to : ''+req.body.email+'',
			subject : 'Mot de passe oublié',
			text : 'Mot de passe oublié',
			html : '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <title></title> <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]--> <meta name="viewport" content="width=device-width" /><style type="text/css"> @media only screen and (min-width: 620px){.wrapper{min-width:600px !important}.wrapper h1{}.wrapper h1{font-size:40px !important;line-height:47px !important}.wrapper h2{}.wrapper h2{font-size:24px !important;line-height:32px !important}.wrapper h3{}.wrapper h3{font-size:20px !important;line-height:28px !important}.column{}} </style> <style type="text/css"> body {margin: 0; padding: 0; } table {border-collapse: collapse; table-layout: fixed; } * {line-height: inherit; } .btn a:hover, .footer__share-button a:hover, .footer__share-button a:focus, .email-footer__links a:hover, .email-footer__links a:focus {opacity: 0.8; } .preheader, .header, .layout, .column {transition: width 0.25s ease-in-out, max-width 0.25s ease-in-out; } .layout, div.header {max-width: 400px !important; -fallback-width: 95% !important; width: calc(100% - 20px) !important; } div.preheader {max-width: 360px !important; -fallback-width: 90% !important; width: calc(100% - 60px) !important; } .snippet, .webversion {Float: none !important; } .column {max-width: 400px !important; width: 100% !important; } .snippet, .webversion {width: 50% !important; } @media only screen and (min-width: 620px) {.column, .gutter {display: table-cell; Float: none !important; vertical-align: top; } div.preheader, .email-footer {max-width: 560px !important; width: 560px !important; } .snippet, .webversion {width: 280px !important; } div.header, .layout, .one-col .column {max-width: 600px !important; width: 600px !important; } .three-col .column, .column.narrow {max-width: 200px !important; width: 200px !important; } .column.wide {width: 400px !important; } } @media (max-width: 321px) {.layout, .column {min-width: 320px !important; width: 320px !important; } } </style> <!--[if !mso]><!--><style type="text/css"> @import url(https://fonts.googleapis.com/css?family=Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400|Roboto:400,700,400italic,700italic); </style><link href="https://fonts.googleapis.com/css?family=Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400|Roboto:400,700,400italic,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css"> body{background-color:#f5f7fa} </style><meta name="robots" content="noindex,nofollow" /> <meta property="og:title" content="My First Campaign" /> </head> <!--[if mso]> <body class="mso"> <![endif]--> <!--[if !mso]><!--> <body class="full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;"> <!--<![endif]--> <table class="wrapper" style="border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #f5f7fa;" cellpadding="0" cellspacing="0" role="presentation"><tbody><tr><td> <div role="banner"> <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000% - 167440px);"> <div style="border-collapse: collapse;display: table;width: 100%;"> <!--[if (mso)|(IE)]><table align="center" class="preheader" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 280px" valign="top"><![endif]--> <div class="snippet" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #b9b9b9;font-family: "Open Sans",sans-serif;"> </div> <!--[if (mso)|(IE)]></td><td style="width: 280px" valign="top"><![endif]--> <div class="webversion" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #b9b9b9;font-family: "Open Sans",sans-serif;"> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);" id="emb-email-header-container"> <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 600px"><![endif]--> <div class="logo emb-logo-margin-box" style="font-size: 26px;line-height: 32px;Margin-top: 10px;Margin-bottom: 20px;color: #5c91ad;font-family: Roboto,Tahoma,sans-serif;Margin-left: 20px;Margin-right: 20px;" align="center"> <div class="logo-center" style="font-size:26px !important;line-height:32px !important;" align="center" id="emb-email-header">Billetterie TCSP Martinique</div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div role="section"> <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;"> <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #307fb0;"> <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" style="background-color: #307fb0;"><td style="width: 600px" class="w560"><![endif]--> <div class="column" style="text-align: left;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;"> <div style="line-height:65px;font-size:1px">&nbsp;</div> </div> <div style="Margin-left: 20px;Margin-right: 20px;"> <h1 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #44a8c7;font-size: 32px;line-height: 40px;font-family: Cabin,Avenir,sans-serif;text-align: center;"><strong><span style="color:#ffffff">Mot de passe oubli&#233; ?</span></strong></h1><h3 style="Margin-top: 20px;Margin-bottom: 12px;font-style: normal;font-weight: normal;color: #44a8c7;font-size: 17px;line-height: 26px;text-align: center;"><font color="#ffffff">Pas de panique, nous sommes l&#224; !</font></h3> </div> <div style="Margin-left: 20px;Margin-right: 20px;"> <div style="line-height:20px;font-size:1px">&nbsp;</div> </div> <div style="Margin-left: 20px;Margin-right: 20px;"> <div class="btn btn--flat btn--large" style="Margin-bottom: 20px;text-align: center;"> <![if !mso]><a style="border-radius: 4px;display: inline-block;font-size: 14px;font-weight: bold;line-height: 24px;padding: 12px 24px;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #ffffff; color: #44a8c7; font-family: &#39;Open Sans&#39;, sans-serif !important;font-family: "Open Sans",sans-serif;" href="http://localhost:8888/BilletterieTCSP/resetMdp.php?email='+ req.body.email +'">R&#233;initialiser mot de passe</a><![endif]> <!--[if mso]><p style="line-height:0;margin:0;">&nbsp;</p><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://localhost:8888/BilletterieTCSP/resetMdp.php?email='+ req.body.email +'" style="width:228px" arcsize="9%" fillcolor="#FFFFFF" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,11px,0px,11px"><center style="font-size:14px;line-height:24px;color:#44A8C7;font-family:sans-serif;font-weight:bold;mso-line-height-rule:exactly;mso-text-raise:4px">R&#233;initialiser mot de passe</center></v:textbox></v:roundrect><![endif]--></div> </div> <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;"> <div style="line-height:12px;font-size:1px">&nbsp;</div> </div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;"> <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;" emb-background-style> <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" emb-background-style><td style="width: 600px" class="w560"><![endif]--> <div class="column" style="text-align: left;color: #60666d;font-size: 14px;line-height: 21px;font-family: "Open Sans",sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;"> <div style="line-height:10px;font-size:1px">&nbsp;</div> </div> <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;"> <h2 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #44a8c7;font-size: 20px;line-height: 28px;text-align: center;"><strong>Ce n\'est pas vous ?</strong></h2><p class="size-16" style="Margin-top: 16px;Margin-bottom: 0;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16">Vous n\'avez pas demand&#233; &#224; r&#233;initialiser votre mot de passe ?</p><p class="size-16" style="Margin-top: 20px;Margin-bottom: 0;font-size: 16px;line-height: 24px;text-align: center;" lang="x-size-16">Vous pouvez ignorer ce message</p> </div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div role="contentinfo"> <div class="layout email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;"> <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;"> <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 400px;" valign="top" class="w360"><![endif]--> <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #b9b9b9;font-family: "Open Sans",sans-serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;"> <table class="email-footer__links emb-web-links" style="border-collapse: collapse;table-layout: fixed;" role="presentation"><tbody><tr role="navigation"> </tr></tbody></table> <div style="font-size: 12px;line-height: 19px;Margin-top: 20px;"> <div>Billetterie TCSP Martinique<br /> contact.billeterie.tcsp@gmail.com</div> </div> <div style="font-size: 12px;line-height: 19px;Margin-top: 18px;"> <div>Vous recevez cet email car vous avez demandez &#224; r&#233;initialiser votre mot de passe</div> </div> </div> </div> <!--[if (mso)|(IE)]></td><td style="width: 200px;" valign="top" class="w160"><![endif]--> <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #b9b9b9;font-family: "Open Sans",sans-serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;"> </div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> <div class="layout one-col email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;"> <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;"> <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-email-footer"><td style="width: 600px;" class="w560"><![endif]--> <div class="column" style="text-align: left;font-size: 12px;line-height: 19px;color: #b9b9b9;font-family: "Open Sans",sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);"> <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;"> <div style="font-size: 12px;line-height: 19px;"> <unsubscribe style="text-decoration: underline;">Se d&#233;sinscrire</unsubscribe> </div> </div> </div> <!--[if (mso)|(IE)]></td></tr></table><![endif]--> </div> </div> </div> <div style="line-height:40px;font-size:40px;">&nbsp;</div> </div></td></tr></tbody></table> </body></html>'
		}

		transporter.sendMail(mailOptions, function(error, info){
			if(error){
				return console.log(error.message);
			}
			else
			{
				res.writeHead(302, { 

					'Location': 'localhost:8888/BilletterieTCSP/index.php?resetMdp=true'
				});                    

				res.end();
			}
		});
	});
}