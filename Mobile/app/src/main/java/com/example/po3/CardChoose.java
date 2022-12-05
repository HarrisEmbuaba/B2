package com.example.po3;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.po3.model.login.register.DataItemKeranjang;

public class CardChoose extends AppCompatActivity {
    ImageView kurang, tambah;
    TextView jumlah;
    int count = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_card_choose);
        kurang = findViewById(R.id.fkerximagemin1);
        tambah = findViewById(R.id.fkerximageplus1);
        jumlah = findViewById(R.id.hpxjumlah1);

        kurang.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                if (count<=1) count=1;
                else
                    count--;
                jumlah.setText(""+count);
            }
        });

        tambah.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                count++;
                jumlah.setText(""+count);
            }
        });
    }


    }
