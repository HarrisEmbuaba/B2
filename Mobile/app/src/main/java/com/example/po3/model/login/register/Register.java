package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class Register{

	@SerializedName("data")
	private RegisterData data;

	@SerializedName("kode")
	private int kode;

	public void setData(RegisterData data) {
		this.data = data;
	}

	public RegisterData getData() {
		return data;
	}

	public void setKode(int kode){
		this.kode = kode;
	}

	public int getKode(){
		return kode;
	}
}