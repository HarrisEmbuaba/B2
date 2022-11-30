package com.example.po3;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.widget.Toast;

import com.example.po3.API.ApiClient;
import com.example.po3.API.ApiInterface;
import com.example.po3.Adapter.AdapterBarangBaru;
import com.example.po3.model.login.register.DataBarang;
import com.example.po3.model.login.register.ResponseBarang;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class viewall extends AppCompatActivity {

    private RecyclerView rcData;
    private RecyclerView.Adapter acData;
    private RecyclerView.LayoutManager lmData;
    private List<DataBarang> listData1 = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_viewall);

        retrieveDataBaru();

        rcData = this.findViewById(R.id.rc_data);
        rcData.setHasFixedSize(true);
        rcData.setLayoutManager(new GridLayoutManager(viewall.this,2));
    }

    public void retrieveDataBaru() {
        ApiInterface ai = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponseBarang> tampilData = ai.ardretriveData();
        tampilData.enqueue(new Callback<ResponseBarang>() {
            @Override
            public void onResponse(Call<ResponseBarang> call, Response<ResponseBarang> response) {
                int kode = response.body().getKode();
                String pesan = response.body().getPesan();

                Toast.makeText(viewall.this, "Kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();

                listData1 = response.body().getData();

                acData = new AdapterBarangBaru(viewall.this, listData1);
                rcData.setAdapter(acData);
                acData.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponseBarang> call, Throwable t) {
                Toast.makeText(viewall.this, "Gagal Menghubungi Server : "+t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }
}