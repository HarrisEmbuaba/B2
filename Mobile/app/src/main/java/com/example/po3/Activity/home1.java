package com.example.po3.Activity;

import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.example.po3.API.ApiClient;
import com.example.po3.API.ApiInterface;
import com.example.po3.R;
import com.example.po3.Adapter.AdapterBarang;
import com.example.po3.R;
import com.example.po3.model.login.register.DataBarang;
import com.example.po3.model.login.register.DataItem;
import com.example.po3.model.login.register.ResponseBarang;
import com.example.po3.model.login.register.ResponseBarangBaru;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class home1 extends Fragment {
    private RecyclerView rvData;
    private RecyclerView.Adapter adData;
    private RecyclerView.LayoutManager lmData;
    private List<DataItem> listData = new ArrayList<>();

    TextView setGreteing;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_home1, container, false);


    }
//    @Override
//    public void onViewCreated(View view, Bundle savedInstanceState) {

//    }


    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
        setGreteing = (TextView) getView().findViewById(R.id.hi);
        String nama = getActivity().getIntent().getStringExtra("namaUser");
        setGreteing.setText("Hi "+nama);

//        rvData = getView().findViewById(R.id.rv_data);
//        lmData = new LinearLayoutManager(this.getActivity(), LinearLayoutManager.VERTICAL, false);
//        rvData.setLayoutManager(lmData);
        retrieveData();


        rvData = view.findViewById(R.id.rv_data);
        rvData.setHasFixedSize(true);
        rvData.setLayoutManager(new GridLayoutManager(getActivity(),2));
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);


    }

    public void retrieveData() {
        ApiInterface ai = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponseBarangBaru> tampilData = ai.ardretriveNewData();
        tampilData.enqueue(new Callback<ResponseBarangBaru>() {
            @Override
            public void onResponse(Call<ResponseBarangBaru> call, Response<ResponseBarangBaru> response) {
                int kode = response.body().getKode();
                String pesan = response.body().getMessage();


                Toast.makeText(getActivity(), "Kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();

                listData = response.body().getData();

                adData = new AdapterBarang(getContext(), listData);
                rvData.setAdapter(adData);
                adData.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponseBarangBaru> call, Throwable t) {
                Toast.makeText(getActivity(), "Gagal Menghubungi Server : "+t.getMessage(), Toast.LENGTH_SHORT).show();

            }
        });
    }

//    public void retriveBarang() {
//        ApiInterface ai = ApiClient.getClient().create(ApiInterface.class);
//        Call<ResponseBarang> tampilData = ai.ardBarang();
//
//
//        tampilData.enqueue(new Callback<ResponseBarang>() {
//            @Override
//            public void onResponse(Call<ResponseBarang> call, Response<ResponseBarang> response) {
//                int kode = response.body().getKode();
//                String pesan = response.body().getPesan();
//
//
//                Toast.makeText(getActivity(), "Kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();
//
//                listData = response.body().getData();
//
//                adData = new AdapterBarang(getContext(), listData);
//                rvData.setAdapter(adData);
//                adData.notifyDataSetChanged();
//
//            }
//
//            @Override
//            public void onFailure(Call<ResponseBarang> call, Throwable t) {
//                Toast.makeText(getActivity(), "Gagal Menghubungi Server : "+t.getMessage(), Toast.LENGTH_SHORT).show();
//
//            }
//        });
//    }




}