package com.example.po3.model.login.register;

import com.google.gson.annotations.SerializedName;

public class DataItemHampers {

	@SerializedName("ukuran")
	private String ukuran;

	@SerializedName("warna")
	private String warna;

	@SerializedName("image")
	private String image;

	@SerializedName("stok")
	private String stok;

	@SerializedName("harga")
	private String harga;

	@SerializedName("id_barang")
	private String idBarang;

	@SerializedName("id_jenis")
	private String idJenis;

	@SerializedName("barang_jenis")
	private String barangJenis;

	@SerializedName("id_warna")
	private String idWarna;

	@SerializedName("nama_barang")
	private String namaBarang;

	@SerializedName("id")
	private String id;

	@SerializedName("deskripsi")
	private String deskripsi;

	@SerializedName("id_ukuran")
	private String idUkuran;

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

	public void setImage(String image){
		this.image = image;
	}

	public String getImage(){
		return image;
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

	public void setIdBarang(String idBarang){
		this.idBarang = idBarang;
	}

	public String getIdBarang(){
		return idBarang;
	}

	public void setIdJenis(String idJenis){
		this.idJenis = idJenis;
	}

	public String getIdJenis(){
		return idJenis;
	}

	public void setBarangJenis(String barangJenis){
		this.barangJenis = barangJenis;
	}

	public String getBarangJenis(){
		return barangJenis;
	}

	public void setIdWarna(String idWarna){
		this.idWarna = idWarna;
	}

	public String getIdWarna(){
		return idWarna;
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

	public void setDeskripsi(String deskripsi){
		this.deskripsi = deskripsi;
	}

	public String getDeskripsi(){
		return deskripsi;
	}

	public void setIdUkuran(String idUkuran){
		this.idUkuran = idUkuran;
	}

	public String getIdUkuran(){
		return idUkuran;
	}
}