package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class VerifEmail {
    @SerializedName("kode")
    private int kode;

    public void setKode(int kode) {
        this.kode = kode;
    }

    public int getKode() {
        return kode;
    }
}
