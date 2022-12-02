package com.example.po3.Activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.po3.API.ApiClient;
import com.example.po3.Adapter.AdapterBarang;
import com.example.po3.Bucket;
import com.example.po3.MyFunction;
import com.example.po3.R;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;

import butterknife.BindView;
import butterknife.ButterKnife;

public class detailbarang extends MyFunction {

    ImageView image;
    TextView barang_jenis;
    TextView nama_barang;
    TextView harga;
    TextView deskripsi;
    ImageView imageView;
    String id,jenis,nama,detail,gambar,harga1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detailbarang);
//        toHome();

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

        int cv = Integer.parseInt(harga1);
        String hasilConvert = toRupiah(cv);
        harga.setText(hasilConvert);
        Picasso.get().load(ApiClient.IMAGES_URL+gambar).
                error(R.mipmap.ic_launcher).into(image);
    }

    public static String toRupiah(int rupiah){
        DecimalFormat kursIndonesia = (DecimalFormat) DecimalFormat.getCurrencyInstance();
        DecimalFormatSymbols formatRp = new DecimalFormatSymbols();

        formatRp.setCurrencySymbol("Rp. ");
        formatRp.setMonetaryDecimalSeparator('.');
        formatRp.setGroupingSeparator('.');
        kursIndonesia.setDecimalFormatSymbols(formatRp);
        return kursIndonesia.format(rupiah);
    }

//    public void toHome(){
//        imageView = findViewById(R.id.back);
//        imageView.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View view) {
//                Intent i = new Intent(detailbarang.this, ho.class);
//                i.putExtra("namaUser", getIntent().getStringExtra("namaUser"));
//                startActivity(i);
//            }
//        });
//    }
}