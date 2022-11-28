package com.example.po3.model.login.register;

import java.util.List;
import com.google.gson.annotations.SerializedName;

public class ResponseBarangBaru{

	@SerializedName("data")
	private List<DataItem> data;

	@SerializedName("kode")
	private int kode;

	@SerializedName("message")
	private String message;

	public void setData(List<DataItem> data){
		this.data = data;
	}

	public List<DataItem> getData(){
		return data;
	}

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