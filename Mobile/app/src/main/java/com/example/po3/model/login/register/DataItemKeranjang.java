package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class DataItemKeranjang {

	@SerializedName("ukuran_keranjang")
	private String ukuran_keranjang;

	@SerializedName("image")
	private String image;

	@SerializedName("warna")
	private String warna;

	@SerializedName("harga_keranjang")
	private String harga_keranjang;

	@SerializedName("nama")
	private String nama;

	@SerializedName("jumlah")
	private String jumlah;

	@SerializedName("id_barang")
	private String idBarang;

	@SerializedName("barang_jenis")
	private String barangJenis;

	@SerializedName("nama_barang")
	private String namaBarang;

	@SerializedName("stok")
	private String stok;

	@SerializedName("deskripsi")
	private String deskripsi;

	@SerializedName("id_user")
	private String idUser;

	public void setUkuran(String ukuran){
		this.ukuran_keranjang = ukuran;
	}

	public String getUkuran(){
		return ukuran_keranjang;
	}

	public void setImage(String image){
		this.image = image;
	}

	public String getImage(){
		return image;
	}

	public void setWarna(String warna){
		this.warna = warna;
	}

	public String getWarna(){
		return warna;
	}

	public void setHarga(String harga){
		this.harga_keranjang = harga;
	}

	public String getHarga(){
		return harga_keranjang;
	}

	public void setNama(String nama){
		this.nama = nama;
	}

	public String getNama(){
		return nama;
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

	public void setStok(String stok){
		this.stok = stok;
	}

	public String getStok(){
		return stok;
	}

	public void setDeskripsi(String deskripsi){
		this.deskripsi = deskripsi;
	}

	public String getDeskripsi(){
		return deskripsi;
	}

	public void setIdUser(String idUser){
		this.idUser = idUser;
	}

	public String getIdUser(){
		return idUser;
	}
}