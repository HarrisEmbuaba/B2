package com.example.po3.Activity;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.po3.R;


public class home1 extends Fragment {

 TextView setGreteing;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_home1, container, false);
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {
        setGreteing = (TextView) getView().findViewById(R.id.hi);
        String nama = getActivity().getIntent().getStringExtra("namaUser");
        setGreteing.setText("Hi "+nama);
    }
}