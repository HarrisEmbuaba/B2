package com.example.po3.Activity;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.widget.Toast;

import com.example.po3.API.ApiClient;
import com.example.po3.API.ApiInterface;
import com.example.po3.Adapter.AdapterBarang;
import com.example.po3.Adapter.AdapterSearch;
import com.example.po3.R;
import com.example.po3.model.login.register.DataBarang;
import com.example.po3.model.login.register.DataItemNew;
import com.example.po3.model.login.register.ResponseBarang;
import com.example.po3.model.login.register.ResponseBarangBaru;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class SearchView extends AppCompatActivity {
    private RecyclerView rvData;
    private RecyclerView.Adapter adData;
    private RecyclerView.LayoutManager lmData;
    private List<DataBarang> listData = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search_view);

        rvData = findViewById(R.id.recycleview);
        rvData.setHasFixedSize(true);
        rvData.setLayoutManager(new LinearLayoutManager(this));
    }

    public void retrieveData() {
        ApiInterface ai = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponseBarang> tampilData = ai.ardretriveData();
        tampilData.enqueue(new Callback<ResponseBarang>() {
            @Override
            public void onResponse(Call<ResponseBarang> call, Response<ResponseBarang> response) {
                int kode = response.body().getKode();
                String pesan = response.body().getPesan();


                Toast.makeText(SearchView.this, "Kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();

                listData = response.body().getData();

                adData = new AdapterSearch(SearchView.this, listData);
                rvData.setAdapter(adData);
                adData.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponseBarang> call, Throwable t) {
                Toast.makeText(SearchView.this, "Gagal Menghubungi Server : "+t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }
}