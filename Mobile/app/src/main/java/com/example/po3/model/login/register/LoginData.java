package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class LoginData {

	@SerializedName("telp")
	private String telp;

	@SerializedName("nama")
	private String nama;

	@SerializedName("id")
	private int id;

	@SerializedName("email")
	private String email;

	public void setTelp(String telp){
		this.telp = telp;
	}

	public String getTelp(){
		return telp;
	}

	public void setNama(String nama){
		this.nama = nama;
	}

	public String getNama(){
		return nama;
	}

	public void setId(int id){
		this.id = id;
	}

	public int getId(){
		return id;
	}

	public void setEmail(String email){
		this.email = email;
	}

	public String getEmail(){
		return email;
	}
}