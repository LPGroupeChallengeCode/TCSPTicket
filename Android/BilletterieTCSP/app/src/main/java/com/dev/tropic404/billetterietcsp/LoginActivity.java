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

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;
import com.dev.tropic404.billetterietcsp.API.BilletterieTCSPArrayApi;
import com.dev.tropic404.billetterietcsp.model.User;

import java.util.List;

public class LoginActivity extends AppCompatActivity {

    String API = "adresse de l'api";
    //UI references
    Button loginButton;
    Button registerButton;
    EditText emailInput;
    EditText mdpInput;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        //setup UI
        emailInput = (EditText)findViewById(R.id.emailInput);
        mdpInput = (EditText)findViewById(R.id.mdpInput);
        loginButton = (Button)findViewById(R.id.loginButton);
        registerButton = (Button)findViewById(R.id.registerButton);

        //login button function
        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String email = emailInput.getText().toString();
                String mdp = mdpInput.getText().toString();
                if(!email.equals("") && !mdp.equals("")){
                    LoginRetrofit(email, mdp);
                }
            }
        });

        //register button function
        registerButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(getBaseContext(), RegisterActivity.class);
                startActivity(intent);
            }
        });

    }

    void LoginRetrofit(String email, String mdp){
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(API)
                .addConverterFactory(GsonConverterFactory.create())
                .build();

        BilletterieTCSPArrayApi service = retrofit.create(BilletterieTCSPArrayApi.class);

        Call<List<User>> call = service.login(email, mdp);
        call.enqueue(new Callback<List<User>>() {
            @Override
            public void onResponse(Call<List<User>> call, Response<List<User>> response) {
                try{
                    List<User> userData = response.body();
                    if(userData != null && userData.size() > 0){
                        Intent intent = new Intent(getBaseContext(), BoutiqueActivity.class);
                        intent.putExtra("userId", userData.get(0).getUserId());
                        intent.putExtra("nom", userData.get(0).getNom());
                        intent.putExtra("prenom", userData.get(0).getPrenom());
                        intent.putExtra("email", userData.get(0).getEmail());

                        startActivity(intent);
                        finish();
                    }
                    else {
                        AlertDialog.Builder alert = new AlertDialog.Builder(LoginActivity.this);
                        TextView textView = new TextView(LoginActivity.this);
                        textView.setText(R.string.erreurLogin);
                        alert.setTitle("Erreur connexion");
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
                    }
                }
                catch (Exception e){
                    Log.d("onResponse", "erreur");
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
