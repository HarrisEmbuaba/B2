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
import com.example.po3.Adapter.AdapterSeserahan;
import com.example.po3.model.login.register.DataItemHampers;
import com.example.po3.model.login.register.DataItemSeserahan;
import com.example.po3.model.login.register.ResponseBarangBaru;
import com.example.po3.model.login.register.ResponseHampers;
import com.example.po3.model.login.register.ResponseSeserahan;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Seserahan extends AppCompatActivity {
    private RecyclerView RvView;
    private RecyclerView.Adapter AvData;
    private RecyclerView.LayoutManager lmData;
    private List<DataItemSeserahan> listData4 = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_seserahan);
        retrieveData4();

        RvView = this.findViewById(R.id.Rc_view2);
        RvView.setHasFixedSize(true);
        RvView.setLayoutManager(new GridLayoutManager(Seserahan.this,2));
    }

    public void retrieveData4() {
        ApiInterface ai = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponseSeserahan> tampilData = ai.getSeserahan("barang_jenis");
        tampilData.enqueue(new Callback<ResponseSeserahan>() {
            @Override
            public void onResponse(Call<ResponseSeserahan> call, Response<ResponseSeserahan> response) {
                int kode = response.body().getKode();
                String pesan = response.body().getMessage();

                Toast.makeText(Seserahan.this, "Kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();

                listData4 = response.body().getData();

                AvData = new AdapterSeserahan(Seserahan.this, listData4);
                RvView.setAdapter(AvData);
                AvData.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponseSeserahan> call, Throwable t) {
                Toast.makeText(Seserahan.this, "Gagal Menghubungi Server : "+t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }
}