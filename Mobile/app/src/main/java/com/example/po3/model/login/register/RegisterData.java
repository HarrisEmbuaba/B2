package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class RegisterData {

	@SerializedName("nama")
	private String nama;

	@SerializedName("email")
	private String email;

	public void setNama(String nama){
		this.nama = nama;
	}

	public String getNama(){
		return nama;
	}

	public void setEmail(String email){
		this.email = email;
	}

	public String getEmail(){
		return email;
	}
}