package com.example.po3;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.SearchView;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.example.po3.API.ApiClient;
import com.example.po3.API.ApiInterface;
import com.example.po3.Activity.home;
import com.example.po3.Adapter.AdapterBarang;
import com.example.po3.Adapter.AdapterCari;
import com.example.po3.model.login.register.DataBarang;
import com.example.po3.model.login.register.DataItemNew;
import com.example.po3.model.login.register.ResponseBarang;
import com.example.po3.model.login.register.ResponseBarangBaru;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class cardata extends AppCompatActivity {
    private RecyclerView rvData;
    private RecyclerView.Adapter adData;
    private RecyclerView.LayoutManager lmData;
    private List<DataBarang> listData = new ArrayList<>();
    private SearchView searchView;
    AdapterCari adapterCari;

    TextView setGreteing;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cardata);
        retrieveData();
//        setGreteing = (TextView) findViewById(R.id.ukuran);
//        String nama = getIntent().getStringExtra("ukuran");
//        setGreteing.setText("ukuran "+nama);

        rvData = findViewById(R.id.Tvrecycleview);
        lmData = new LinearLayoutManager(this, LinearLayoutManager.VERTICAL, false);
        rvData.setLayoutManager(lmData);

        searchView = findViewById(R.id.search2);
        searchView.clearFocus();
        searchView.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
            @Override
            public boolean onQueryTextSubmit(String query) {
                return false;
            }

            @Override
            public boolean onQueryTextChange(String newText) {
                FilterList(newText);
                return true;
            }
        });
    }

    public void FilterList(String text){

        List<DataBarang> FilteredList = new ArrayList<>();
        for (DataBarang brg : listData){
            if (brg.getJenis().toLowerCase().contains(text.toLowerCase())){

                FilteredList.add(brg);
            }
        }

        if (FilteredList.isEmpty()){
            Toast.makeText(cardata.this, "No Data", Toast.LENGTH_SHORT).show();
        } else {

            adapterCari.setFilteredList(FilteredList);
        }
    }


    public void retrieveData() {
        ApiInterface ai = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponseBarang> tampilData = ai.ardretriveData();
        tampilData.enqueue(new Callback<ResponseBarang>() {
            @Override
            public void onResponse(Call<ResponseBarang> call, Response<ResponseBarang> response) {
                int kode = response.body().getKode();
                String pesan = response.body().getPesan();


                Toast.makeText(cardata.this, "Kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();

                listData = response.body().getData();

                adapterCari = new AdapterCari(cardata.this, listData);
                rvData.setAdapter(adapterCari);
                adapterCari.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponseBarang> call, Throwable t) {
                Toast.makeText(cardata.this, "Gagal Menghubungi Server : "+t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }
}