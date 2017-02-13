package com.dev.tropic404.billetterietcsp.model;

import java.util.List;

/**
 * Created by Oriane on 12/02/2017.
 */

public class User {
    private String userId, nom, prenom, email, password;

    public String getEmail() {
        return email;
    }

    public String getNom() {
        return nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public String getPassword() {
        return password;
    }

    public String getUserId() {
        return userId;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    public void setUserId(String userId) {
        this.userId = userId;
    }
}
