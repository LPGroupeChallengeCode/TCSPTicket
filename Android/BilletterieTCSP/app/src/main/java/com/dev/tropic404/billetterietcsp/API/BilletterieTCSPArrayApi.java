package com.dev.tropic404.billetterietcsp.API;

import java.util.List;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.POST;
import retrofit2.http.Path;
import com.dev.tropic404.billetterietcsp.model.Commande;
import com.dev.tropic404.billetterietcsp.model.Ticket;
import com.dev.tropic404.billetterietcsp.model.User;

/**
 * Created by Oriane on 12/02/2017.
 */

public interface BilletterieTCSPArrayApi {

    //user
    @GET("inscription/app/{nom}/{prenom}/{email}/{password}")
    Call<List<User>> inscription(@Path("nom") String nom, @Path("prenom") String prenom, @Path("email") String email, @Path("password") String mdp);

    @GET("user/{id}")
    Call<List<User>> getUser(@Path("id") String id);

    @GET("login/app/{email}/{password}")
    Call<List<User>> login(@Path("email") String email, @Path("password") String mdp);

    //ticket

    //commande
}
