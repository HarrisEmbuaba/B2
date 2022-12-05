package com.example.po3.Activity;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;
import androidx.constraintlayout.widget.ConstraintLayout;
import androidx.core.view.GravityCompat;

import android.content.Intent;
import android.os.Bundle;
import android.transition.AutoTransition;
import android.transition.TransitionManager;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.po3.API.ApiClient;
import com.example.po3.Adapter.AdapterBarang;
import com.example.po3.Bucket;
import com.example.po3.CardChoose;
import com.example.po3.DialogKeranjang;
import com.example.po3.MyFunction;
import com.example.po3.R;
import com.example.po3.viewall;
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
    TextView tvukuran;
    ImageView imageView, arrow;
    String id,jenis,nama,detail,gambar,harga1,ukuran;
    Button button;
    CardView cardView;
    ConstraintLayout showlayout, hiddenlayout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detailbarang);
//        toHome();

        button = findViewById(R.id.buttonMasukan);
        cardView = findViewById(R.id.choose);
        showlayout = findViewById(R.id.layout_expand);
        hiddenlayout = findViewById(R.id.hidden);
        arrow = findViewById(R.id.arrowBawah);

        button.setOnClickListener(view -> {
            if(cardView.getVisibility() == View.GONE){
                TransitionManager.beginDelayedTransition(showlayout, new AutoTransition());
                cardView.setVisibility(View.VISIBLE);
            }
            else{
                TransitionManager.beginDelayedTransition(showlayout, new AutoTransition());
                cardView.setVisibility(View.VISIBLE);
            }
        });

        arrow.setOnClickListener(view -> {
            if(cardView.getVisibility() == View.VISIBLE){
                TransitionManager.beginDelayedTransition(showlayout, new AutoTransition());
                cardView.setVisibility(View.GONE);
            }else{
                TransitionManager.beginDelayedTransition(showlayout, new AutoTransition());
                cardView.setVisibility(View.VISIBLE);
            }
        });



        image = findViewById(R.id.bucketbunga);
        barang_jenis= findViewById(R.id.bucket);
        nama_barang = findViewById(R.id.palsu);
        harga = findViewById(R.id.hargabucket);
        deskripsi = findViewById(R.id.panjang);
        tvukuran = findViewById(R.id.jenisUkuran);
        //tambahan
        id = getIntent().getStringExtra("id");
        jenis = getIntent().getStringExtra("barang_jenis");
        nama = getIntent().getStringExtra("nama_barang");
        ukuran = getIntent().getStringExtra("ukuran");
        detail = getIntent().getStringExtra("deskripsi");
        harga1 = getIntent().getStringExtra("harga");
        gambar = getIntent().getStringExtra("image");

        barang_jenis.setText(jenis);
        // Hehe
        deskripsi.setText(detail);
        nama_barang.setText(nama);
        tvukuran.setText(ukuran);

        int cv = Integer.parseInt(harga1);
        String hasilConvert = toRupiah(cv);
        harga.setText(hasilConvert);
        Picasso.get().load(ApiClient.IMAGES_URL+gambar).resize(325, 340).
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

//    public  void toKeranjang(){
//        button = (Button) findViewById(R.id.buttonMasukan);
//        button.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View view) {
//                openDialog();
//
//            }
//        });
//    }
//
//    public void openDialog() {
//        DialogKeranjang dialogKeranjang = new DialogKeranjang();
//        dialogKeranjang.show(getSupportFragmentManager(), "dialog keranjang");
//    }

}