package com.example.po3.Activity;

import androidx.cardview.widget.CardView;
import androidx.constraintlayout.widget.ConstraintLayout;

import android.os.Bundle;
import android.transition.AutoTransition;
import android.transition.TransitionManager;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.po3.API.ApiClient;
import com.example.po3.MyFunction;
import com.example.po3.R;
import com.example.po3.model.login.register.DataBarang;
import com.example.po3.model.login.register.DataItemKeranjang;
import com.example.po3.model.login.register.DataItemNew;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.text.DecimalFormatSymbols;
import java.util.List;

public class detailbarang extends MyFunction {

    ImageView image, image2;
    TextView barang_jenis;
    TextView nama_barang;
    TextView harga;
    TextView deskripsi;
    TextView tvukuran, tvStok, ivHarga, ivHarga1, tvStok1;
    ImageView imageView, arrow, arrow1;
    String id,jenis,nama,detail,gambar,harga1,stok;
    Button button, button1;
    CardView cardView, cardView1;
    ConstraintLayout showlayout, hiddenlayout, hiddenlayout1;
    ImageView kurang, tambah;
    TextView jumlah;
    int count = 1;
    ;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detailbarang);
//        toHome();
        kurang = findViewById(R.id.fkerximagemin1);
        tambah = findViewById(R.id.fkerximageplus1);
        jumlah = findViewById(R.id.hpxjumlah1);




        kurang.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                if (count <= 1) count=1;
                else
                    count--;
                jumlah.setText(""+count);
            }
        });

        tambah.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                if (count >= Integer.parseInt(tvStok.getText().toString()));
                    else
                count++;
                jumlah.setText(""+count);
            }
     });
        button1 = findViewById(R.id.fkerxbtnbeli);
        button = findViewById(R.id.buttonMasukan);
        cardView = findViewById(R.id.choose);
        cardView1 = findViewById(R.id.choose1);
        showlayout = findViewById(R.id.layout_expand);
        hiddenlayout = findViewById(R.id.hidden);
        hiddenlayout1 = findViewById(R.id.hidden1);
        arrow1 = findViewById(R.id.arrowBawah1);
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

        button1.setOnClickListener(view -> {
            if(cardView1.getVisibility() == View.GONE){
                TransitionManager.beginDelayedTransition(showlayout, new AutoTransition());
                cardView1.setVisibility(View.VISIBLE);
            }
            else{
                TransitionManager.beginDelayedTransition(showlayout, new AutoTransition());
                cardView1.setVisibility(View.VISIBLE);
            }
        });

        arrow1.setOnClickListener(view -> {
            if(cardView1.getVisibility() == View.VISIBLE){
                TransitionManager.beginDelayedTransition(showlayout, new AutoTransition());
                cardView1.setVisibility(View.GONE);
            }else{
                TransitionManager.beginDelayedTransition(showlayout, new AutoTransition());
                cardView1.setVisibility(View.VISIBLE);
            }
        });

        imageView = findViewById(R.id.gambarkecil);
        image2 = findViewById(R.id.gambarkecil1);
        image = findViewById(R.id.bucketbunga);
        barang_jenis= findViewById(R.id.bucket);
        nama_barang = findViewById(R.id.palsu);
        harga = findViewById(R.id.hargabucket);
        deskripsi = findViewById(R.id.panjang);
        tvStok = findViewById(R.id.getStok);
        tvukuran = findViewById(R.id.jenisUkuran);
        ivHarga = findViewById(R.id.chooseHarga);
        ivHarga1 = findViewById(R.id.chooseHarga1);
        tvStok1 = findViewById(R.id.getStok1);
        //tambahan
        id = getIntent().getStringExtra("id");
        jenis = getIntent().getStringExtra("barang_jenis");
        nama = getIntent().getStringExtra("nama_barang");
        stok = getIntent().getStringExtra("stok");
        detail = getIntent().getStringExtra("deskripsi");
        harga1 = getIntent().getStringExtra("harga");
        gambar = getIntent().getStringExtra("image");

        barang_jenis.setText(jenis);
        // Hehe
        deskripsi.setText(detail);
        nama_barang.setText(nama);
        tvukuran.setText(stok);
        tvStok.setText(stok);
        tvStok1.setText(stok);

        int cv = Integer.parseInt(harga1);
        String hasilConvert = toRupiah(cv);
        ivHarga1.setText(hasilConvert);
        ivHarga.setText(hasilConvert);
        harga.setText(hasilConvert);
        Picasso.get().load(ApiClient.IMAGES_URL+gambar).resize(325, 340).
                error(R.mipmap.ic_launcher).into(image);
        Picasso.get().load(ApiClient.IMAGES_URL+gambar).resize(80, 80).error(R.mipmap.ic_launcher).into(imageView);
        Picasso.get().load(ApiClient.IMAGES_URL+gambar).resize(80, 80).error(R.mipmap.ic_launcher).into(image2);

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