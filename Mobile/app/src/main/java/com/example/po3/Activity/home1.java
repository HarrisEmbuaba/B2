package com.example.po3.Activity;

import android.content.Intent;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.widget.SearchView;
import androidx.cardview.widget.CardView;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.TextView;
import android.widget.Toast;

import com.example.po3.API.ApiClient;
import com.example.po3.API.ApiInterface;
import com.example.po3.Bucket;
import com.example.po3.Hampers;
import com.example.po3.R;
import com.example.po3.Adapter.AdapterBarang;
import com.example.po3.Seserahan;
import com.example.po3.cardata;
import com.example.po3.model.login.register.DataItemNew;
import com.example.po3.model.login.register.ResponseBarangBaru;
import com.example.po3.viewall;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class home1 extends Fragment {
    private RecyclerView rvData;
    private RecyclerView.Adapter adData;
    private RecyclerView.LayoutManager lmData;
    private List<DataItemNew> listData = new ArrayList<>();
//    private SearchView searchView;
    TextView viewSemua;
    Button TvBucket, TvHampers, TvSeserahan;
    ImageButton Tvkeranjang;
    CardView cardView;

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
        LihatSemua();
        LihatBucket();
        LihatHampers();
        LihatSeserahan();
        LihatKeranjang();
        Tosearch();

//        searchView = view.findViewById(R.id.search);
//        searchView.clearFocus();
//        searchView.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
//            @Override
//            public boolean onQueryTextSubmit(String query) {
//                return false;
//            }
//
//            @Override
//            public boolean onQueryTextChange(String newText) {
//                filterList(newText);
//                return true;
//            }
//        });
        rvData = view.findViewById(R.id.rv_data);
        rvData.setHasFixedSize(true);
        rvData.setLayoutManager(new GridLayoutManager(getActivity(),2));
    }

    private void filterList(String text) {
    }

    public void LihatSemua(){
        viewSemua = getView().findViewById(R.id.view);
        viewSemua.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getContext(), viewall.class);
                i.putExtra("namaUser", getActivity().getIntent().getStringExtra("namaUser"));
                startActivity(i);
            }
        });
    }

    public void Tosearch(){
        cardView = getView().findViewById(R.id.search);
        cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getContext(), cardata.class);
                i.putExtra("namaUser", getActivity().getIntent().getStringExtra("namaUser"));
                startActivity(i);
            }
        });
    }

    public void LihatKeranjang(){
        Tvkeranjang = getView().findViewById(R.id.belanja);
        Tvkeranjang.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getContext(), keranjang.class);
                i.putExtra("namaUser", getActivity().getIntent().getStringExtra("namaUser"));
                startActivity(i);
            }
        });
    }



    public void LihatBucket(){
        TvBucket = getView().findViewById(R.id.buket);
        TvBucket.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getContext(), Bucket.class);
                i.putExtra("namaUser", getActivity().getIntent().getStringExtra("namaUser"));
                startActivity(i);
            }
        });
    }

    public void LihatHampers(){
        TvHampers = getView().findViewById(R.id.hampers);
        TvHampers.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getContext(), Hampers.class);
                i.putExtra("namaUser", getActivity().getIntent().getStringExtra("namaUser"));
                startActivity(i);
            }
        });
    }

    public void LihatSeserahan(){
        TvSeserahan = getView().findViewById(R.id.seserahan);
        TvSeserahan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getContext(), Seserahan.class);
                i.putExtra("namaUser", getActivity().getIntent().getStringExtra("namaUser"));
                startActivity(i);
            }
        });
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