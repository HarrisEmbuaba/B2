package com.example.po3;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.po3.API.ApiClient;
import com.squareup.picasso.Picasso;

import butterknife.BindView;
import butterknife.ButterKnife;

public class detailbarang extends MyFunction {
    @BindView(R.id.bucketbunga)
    ImageView image;
    @BindView(R.id.bucket)
    TextView barang_jenis;
    @BindView(R.id.palsu)
    TextView nama_barang;
    @BindView(R.id.hargabucket)
    TextView harga;
    @BindView(R.id.panjang)
    TextView deskripsi;




    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detailbarang);

        ButterKnife.bind(this);
        Intent terima = getIntent();
        barang_jenis.setText(terima.getStringExtra("barang_jenis"));
        nama_barang.setText(terima.getStringExtra("nama_barang"));
        deskripsi.setText(terima.getStringExtra("deskripsi"));
        harga.setText(terima.getStringExtra("harga"));

        Picasso.get().load(ApiClient.IMAGES_URL+terima.getStringExtra("image")).error(R.mipmap.ic_launcher).into(image);
    }
}