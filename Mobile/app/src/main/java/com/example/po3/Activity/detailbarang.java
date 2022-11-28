package com.example.po3.Activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.po3.API.ApiClient;
import com.example.po3.MyFunction;
import com.example.po3.R;
import com.squareup.picasso.Picasso;

import butterknife.BindView;
import butterknife.ButterKnife;

public class detailbarang extends MyFunction {

    ImageView image;
    TextView barang_jenis;
    TextView nama_barang;
    TextView harga;
    TextView deskripsi;
    String id,jenis,nama,detail,gambar,harga1;





    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detailbarang);

        image = findViewById(R.id.bucketbunga);
        barang_jenis= findViewById(R.id.bucket);
        nama_barang = findViewById(R.id.palsu);
        harga = findViewById(R.id.hargabucket);
        deskripsi = findViewById(R.id.panjang);
        //tambahan
        id = getIntent().getStringExtra("id");
        jenis = getIntent().getStringExtra("barang_jenis");
        nama = getIntent().getStringExtra("nama_barang");
        detail = getIntent().getStringExtra("deskripsi");
        harga1 = getIntent().getStringExtra("harga");
        gambar = getIntent().getStringExtra("image");

        barang_jenis.setText(jenis);
        // Hehe
        deskripsi.setText(detail);
        nama_barang.setText(nama);
        harga.setText(harga1);
        Picasso.get().load(ApiClient.IMAGES_URL+gambar).
                error(R.mipmap.ic_launcher).into(image);
    }
}