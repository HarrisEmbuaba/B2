package com.example.po3.Activity;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.example.po3.API.ApiClient;
import com.example.po3.API.ApiInterface;
import com.example.po3.Adapter.AdapterCari;
import com.example.po3.Adapter.AdapterKeranjang;
import com.example.po3.R;
import com.example.po3.cardata;
import com.example.po3.model.login.register.DataBarang;
import com.example.po3.model.login.register.DataItemKeranjang;
import com.example.po3.model.login.register.ResponseBarang;
import com.example.po3.model.login.register.ResponseKeranjang;
import com.example.po3.viewall;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class keranjang extends AppCompatActivity {
    ImageView Tvkembali;
    private RecyclerView rvData;
    private RecyclerView.Adapter adData;
    private RecyclerView.LayoutManager lmData;
    private List<DataItemKeranjang> listData = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_keranjang);
        toHome();
        retrieveData();

        rvData = findViewById(R.id.fkerxrecyclekeranjang);
        lmData = new LinearLayoutManager(this, LinearLayoutManager.VERTICAL, false);
        rvData.setLayoutManager(lmData);
    }

 public void toHome(){
       Tvkembali = findViewById(R.id.kembali);
       Tvkembali.setOnClickListener(new View.OnClickListener() {
          @Override
          public void onClick(View view) {
               Intent i = new Intent(keranjang.this, home.class);
                i.putExtra("namaUser", getIntent().getStringExtra("namaUser"));
                startActivity(i);
           }
       });
   }

    public void retrieveData() {
        ApiInterface ai = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponseKeranjang> tampilData = ai.getKeranjang();
        tampilData.enqueue(new Callback<ResponseKeranjang>() {
            @Override
            public void onResponse(Call<ResponseKeranjang> call, Response<ResponseKeranjang> response) {
                int kode = response.body().getKode();
                String pesan = response.body().getPesan();


                Toast.makeText(keranjang.this, "Kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();

                listData = response.body().getData();

                adData = new AdapterKeranjang(keranjang.this, listData);
                rvData.setAdapter(adData);
                adData.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponseKeranjang> call, Throwable t) {
                Toast.makeText(keranjang.this, "Gagal Menghubungi Server : "+t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }
}