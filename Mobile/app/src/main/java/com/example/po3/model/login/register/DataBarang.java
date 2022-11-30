package com.example.po3.model.login.register;

public class DataBarang {
    private int id,stok,id_ukuran,id_warna,id_barang,id_jenis;
    private String barang_jenis,ukuran,warna,nama_barang,image,deskripsi,harga;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getHarga() {
        return harga;
    }

    public void setHarga(String harga) {
        this.harga = harga;
    }

    public int getStok() {
        return stok;
    }

    public void setStok(int stok) {
        this.stok = stok;
    }

    public int getId_ukuran() {
        return id_ukuran;
    }

    public void setId_ukuran(int id_ukuran) {
        this.id_ukuran = id_ukuran;
    }

    public int getId_warna() {
        return id_warna;
    }

    public void setId_warna(int id_warna) {
        this.id_warna = id_warna;
    }

    public int getId_barang() {
        return id_barang;
    }

    public void setId_barang(int id_barang) {
        this.id_barang = id_barang;
    }

    public int getId_jenis() {
        return id_jenis;
    }

    public void setId_jenis(int id_jenis) {
        this.id_jenis = id_jenis;
    }

    public String getJenis() {
        return barang_jenis;
    }

    public void setJenis(String jenis) {
        this.barang_jenis = jenis;
    }

    public String getUkuran() {
        return ukuran;
    }

    public void setUkuran(String ukuran) {
        this.ukuran = ukuran;
    }

    public String getWarna() {
        return warna;
    }

    public void setWarna(String warna) {
        this.warna = warna;
    }

    public String getNama() {
        return nama_barang;
    }

    public void setNama(String nama) {
        this.nama_barang = nama;
    }

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }
}
