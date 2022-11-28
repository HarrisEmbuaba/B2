package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class DataItem{

	@SerializedName("image")
	private String image;

	@SerializedName("ukuran")
	private String ukuran;

	@SerializedName("warna")
	private String warna;

	@SerializedName("barang_jenis")
	private String barangJenis;

	@SerializedName("nama_barang")
	private String namaBarang;

	@SerializedName("id")
	private String id;

	@SerializedName("stok")
	private String stok;

	@SerializedName("harga")
	private String harga;

	@SerializedName("deskripsi")
	private String deskripsi;

	public void setImage(String image){
		this.image = image;
	}

	public String getImage(){
		return image;
	}

	public void setUkuran(String ukuran){
		this.ukuran = ukuran;
	}

	public String getUkuran(){
		return ukuran;
	}

	public void setWarna(String warna){
		this.warna = warna;
	}

	public String getWarna(){
		return warna;
	}

	public void setBarangJenis(String barangJenis){
		this.barangJenis = barangJenis;
	}

	public String getBarangJenis(){
		return barangJenis;
	}

	public void setNamaBarang(String namaBarang){
		this.namaBarang = namaBarang;
	}

	public String getNamaBarang(){
		return namaBarang;
	}

	public void setId(String id){
		this.id = id;
	}

	public String getId(){
		return id;
	}

	public void setStok(String stok){
		this.stok = stok;
	}

	public String getStok(){
		return stok;
	}

	public void setHarga(String harga){
		this.harga = harga;
	}

	public String getHarga(){
		return harga;
	}

	public void setDeskripsi(String deskripsi){
		this.deskripsi = deskripsi;
	}

	public String getDeskripsi(){
		return deskripsi;
	}
}