package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class RegisterData {

	@SerializedName("id_user")
	private int idUser;

	public void setIdUser(int idUser) {this.idUser = idUser;}

	public int getIdUser() {return idUser;}
}