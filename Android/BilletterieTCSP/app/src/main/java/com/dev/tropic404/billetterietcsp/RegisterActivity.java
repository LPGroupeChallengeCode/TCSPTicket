package com.dev.tropic404.billetterietcsp;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.dev.tropic404.billetterietcsp.API.BilletterieTCSPArrayApi;
import com.dev.tropic404.billetterietcsp.model.User;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class RegisterActivity extends AppCompatActivity {

    EditText nomInput, prenomInput, emailInput, mdpInput;
    Button registerButton;
    String API = "adresse API";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        nomInput = (EditText)findViewById(R.id.nomInput);
        prenomInput = (EditText)findViewById(R.id.prenomInput);
        emailInput = (EditText)findViewById(R.id.emailInput);
        mdpInput = (EditText)findViewById(R.id.mdpInput);
        registerButton = (Button)findViewById(R.id.registerButton);

        registerButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(!nomInput.getText().toString().equals("") && prenomInput.getText().toString().equals("") && emailInput.getText().toString().equals("") && mdpInput.getText().toString().equals("")){
                    SignUpRetrofit(nomInput.getText().toString(), prenomInput.getText().toString(), emailInput.getText().toString(), mdpInput.getText().toString());
                }
            }
        });
    }

    void SignUpRetrofit(final String nom, final String prenom, String email, String mdp){
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(API)
                .addConverterFactory(GsonConverterFactory.create())
                .build();

        BilletterieTCSPArrayApi service = retrofit.create(BilletterieTCSPArrayApi.class);

        Call<List<User>> call = service.inscription(nom, prenom, email, mdp);
        call.enqueue(new Callback<List<User>>() {
            @Override
            public void onResponse(Call<List<User>> call, Response<List<User>> response) {
                try {
                    List<User> userData = response.body();
                    if(userData != null){

                        AlertDialog.Builder alert = new AlertDialog.Builder(RegisterActivity.this);
                        TextView textView = new TextView(RegisterActivity.this);
                        textView.setText(R.string.mailInscription);
                        alert.setTitle("Bienvenue "+nom+" "+prenom+"!");
                        LinearLayout.LayoutParams layoutParams = new LinearLayout.LayoutParams(
                                LinearLayout.LayoutParams.MATCH_PARENT,
                                LinearLayout.LayoutParams.MATCH_PARENT
                        );
                        textView.setLayoutParams(layoutParams);
                        alert.setView(textView);
                        alert.setNeutralButton("OK", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                dialog.cancel();
                            }
                        });
                        alert.show();

                        Intent intent = new Intent(getBaseContext(), BoutiqueActivity.class);
                        intent.putExtra("userId", userData.get(0).getUserId());
                        intent.putExtra("nom" , userData.get(0).getNom());
                        intent.putExtra("prenom" , userData.get(0).getPrenom());
                        intent.putExtra("email", userData.get(0).getEmail());

                        startActivity(intent);
                        finish();
                    }
                }
                catch (Exception e){
                    Log.d("onResponse", "There is an error");
                    e.printStackTrace();
                }
            }

            @Override
            public void onFailure(Call<List<User>> call, Throwable t) {
                Log.d("onFailure", t.toString());
            }
        });
    }
}
