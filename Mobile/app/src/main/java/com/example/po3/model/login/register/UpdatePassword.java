package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class UpdatePassword {
    @SerializedName("kode")
    private int kode;

    @SerializedName("message")
    private String message;

    public void setKode(int kode){
        this.kode = kode;
    }

    public int getKode(){
        return kode;
    }

    public void setMessage(String message){
        this.message = message;
    }

    public String getMessage(){
        return message;
    }
}
