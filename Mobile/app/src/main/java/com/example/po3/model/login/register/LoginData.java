package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class LoginData {

	@SerializedName("pass")
	private String pass;

	@SerializedName("nama")
	private String nama;

	@SerializedName("status")
	private String verifyStatus;

	@SerializedName("id_user")
	private String idUser;

	@SerializedName("email")
	private String email;

	public void setPassword(String password){
		this.pass = password;
	}

	public String getPassword(){
		return pass;
	}

	public void setNama(String nama){
		this.nama = nama;
	}

	public String getNama(){
		return nama;
	}

	public void setVerifyStatus(String verifyStatus){
		this.verifyStatus = verifyStatus;
	}

	public String getVerifyStatus(){
		return verifyStatus;
	}

	public void setIdUser(String idUser){
		this.idUser = idUser;
	}

	public String getIdUser(){
		return idUser;
	}

	public void setEmail(String email){
		this.email = email;
	}

	public String getEmail(){
		return email;
	}
}