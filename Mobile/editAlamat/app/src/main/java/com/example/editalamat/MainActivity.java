package com.example.editalamat;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.widget.Spinner;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    Spinner sp_Provinsi,
            sp_kabupaten,
            sp_kecamatan,
            sp_desa;

    String LinkProvinsiAll      ="sp provinsi = findViewById(R.id.sp_provinsi);";
    String LinkProvinsi         ="https://dev.farizdotid.com/api/daerahindonesia/provinsi/32";
    String LinkKabupatenAll     ="https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32";
    String LinkKabupaten        ="https://dev.farizdotid.com/api/daerahindonesia/kota/3201";
    String LinkKecamatanAll     ="https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3214";
    String LinkKecamatan        ="https://dev.farizdotid.com/api/daerahindonesia/kecamatan/3214080";
    String LinkDesaAll          ="https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=3214010";
    String LinkDesa             ="https://dev.farizdotid.com/api/daerahindonesia/kelurahan/3214010006";

    ArrayList<String>listNamaprovinsi=new ArrayList<>();
    ArrayList<String>listNamaKabupaten=new ArrayList<>();
    ArrayList<String>listNamaKecamatan=new ArrayList<>();
    ArrayList<String>listNamaDesa=new ArrayList<>();

    ArrayList<String>listIDprovinsi=new ArrayList<>();
    ArrayList<String>listIDKabupaten=new ArrayList<>();
    ArrayList<String>listIDmaKecamatan=new ArrayList<>();
    ArrayList<String>listIDDesa=new ArrayList<>();

    Context context;
    ProgressDialog progressDialog;654



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Context =this;
        progressDialog= new ProgressDialog(context);
        sp_Provinsi  = findViewById(R.id.provinsi);
        sp_kabupaten = findViewById(R.id.kabupaten);
        sp_kecamatan = findViewById(R.id.kecamatan);
        sp_desa   = findViewById(R.id.Desa);

        showdata();
    }
    private void showdata(){
        StringRequest stringRequest= new StringRequest(Request.Method.GET.linkProvinsiAll.new Response.listener<String>()
    }
}