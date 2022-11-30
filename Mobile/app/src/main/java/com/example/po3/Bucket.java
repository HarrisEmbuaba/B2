package com.example.po3;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.widget.Toast;

import com.example.po3.API.ApiClient;
import com.example.po3.API.ApiInterface;
import com.example.po3.Adapter.AdapterBarang;
import com.example.po3.Adapter.AdapterBucket;
import com.example.po3.model.login.register.DataBarang;
import com.example.po3.model.login.register.DataItemBucket;
import com.example.po3.model.login.register.ResponseBarangBaru;
import com.example.po3.model.login.register.ResponseBucket;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Bucket extends AppCompatActivity {

    private RecyclerView RvView;
    private RecyclerView.Adapter AvData;
    private RecyclerView.LayoutManager lmData;
    private List<DataItemBucket> listData2 = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_bucket);
        retrieveData3();

        RvView = this.findViewById(R.id.Rc_view);
        RvView.setHasFixedSize(true);
        RvView.setLayoutManager(new GridLayoutManager(Bucket.this,2));
    }
    public void retrieveData3() {
        ApiInterface ai = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponseBucket> tampilData = ai.getBucket("barang_jenis");
        tampilData.enqueue(new Callback<ResponseBucket>() {
            @Override
            public void onResponse(Call<ResponseBucket> call, Response<ResponseBucket> response) {
                int kode = response.body().getKode();
                String pesan = response.body().getMessage();

                Toast.makeText(Bucket.this, "Kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();

                listData2 = response.body().getData();

                AvData = new AdapterBucket(Bucket.this, listData2);
                RvView.setAdapter(AvData);
                AvData.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponseBucket> call, Throwable t) {
                Toast.makeText(Bucket.this, "Gagal Menghubungi Server : "+t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }
}