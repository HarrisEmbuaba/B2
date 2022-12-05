package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class DataInsertKeranjang {

	@SerializedName("warna")
	private String warna;

	@SerializedName("jumlah")
	private String jumlah;

	@SerializedName("id_barang")
	private String idBarang;

	@SerializedName("id_user")
	private String idUser;

	@SerializedName("harga_keranjang")
	private String hargaKeranjang;

	@SerializedName("ukuran_keranjang")
	private String ukuranKeranjang;

	public void setWarna(String warna){
		this.warna = warna;
	}

	public String getWarna(){
		return warna;
	}

	public void setJumlah(String jumlah){
		this.jumlah = jumlah;
	}

	public String getJumlah(){
		return jumlah;
	}

	public void setIdBarang(String idBarang){
		this.idBarang = idBarang;
	}

	public String getIdBarang(){
		return idBarang;
	}

	public void setIdUser(String idUser){
		this.idUser = idUser;
	}

	public String getIdUser(){
		return idUser;
	}

	public void setHargaKeranjang(String hargaKeranjang){
		this.hargaKeranjang = hargaKeranjang;
	}

	public String getHargaKeranjang(){
		return hargaKeranjang;
	}

	public void setUkuranKeranjang(String ukuranKeranjang){
		this.ukuranKeranjang = ukuranKeranjang;
	}

	public String getUkuranKeranjang(){
		return ukuranKeranjang;
	}
}