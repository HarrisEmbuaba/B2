package com.example.po3;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.Toast;

import com.example.po3.API.ApiClient;
import com.example.po3.API.ApiInterface;
import com.example.po3.Activity.home;
import com.example.po3.Adapter.AdapterBarang;
import com.example.po3.Adapter.AdapterBucket;
import com.example.po3.Adapter.AdapterHampers;
import com.example.po3.model.login.register.DataItemBucket;
import com.example.po3.model.login.register.DataItemHampers;
import com.example.po3.model.login.register.ResponseBarangBaru;
import com.example.po3.model.login.register.ResponseBucket;
import com.example.po3.model.login.register.ResponseHampers;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Hampers extends AppCompatActivity {
    private RecyclerView RvView;
    private RecyclerView.Adapter AvData;
    private RecyclerView.LayoutManager lmData;
    private List<DataItemHampers> listData3 = new ArrayList<>();
    ImageButton imageButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hampers);
        retrieveData4();
        toHome();

        RvView = this.findViewById(R.id.Rc_view1);
        RvView.setHasFixedSize(true);
        RvView.setLayoutManager(new GridLayoutManager(Hampers.this,2));
    }

    public void retrieveData4() {
        ApiInterface ai = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponseHampers> tampilData = ai.getHampers("barang_jenis");
        tampilData.enqueue(new Callback<ResponseHampers>() {
            @Override
            public void onResponse(Call<ResponseHampers> call, Response<ResponseHampers> response) {
                int kode = response.body().getKode();
                String pesan = response.body().getMessage();

                Toast.makeText(Hampers.this, "Kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();

                listData3 = response.body().getData();

                AvData = new AdapterHampers(Hampers.this, listData3);
                RvView.setAdapter(AvData);
                AvData.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponseHampers> call, Throwable t) {
                Toast.makeText(Hampers.this, "Gagal Menghubungi Server : "+t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }

    public void toHome(){
        imageButton = findViewById(R.id.backto1);
        imageButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(Hampers.this, home.class);
                i.putExtra("namaUser", getIntent().getStringExtra("namaUser"));
                startActivity(i);
            }
        });
    }
}