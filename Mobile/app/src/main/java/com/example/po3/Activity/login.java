package com.example.po3.Activity;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import android.widget.Toast;

import com.example.po3.API.ApiInterface;
import com.example.po3.API.ApiClient;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

import com.example.po3.R;
import com.example.po3.model.login.register.Login;

public class login extends AppCompatActivity implements View.OnClickListener {
    TextView Reg, LupaPw;
    EditText getEmail, getPassword;
    Button toLoginHome;
    String email, pass;
    ApiInterface apiInterface;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        notif(login.this);

        getEmail = findViewById(R.id.email);
        getPassword = findViewById(R.id.password);

        toLoginHome = findViewById(R.id.button);
        toLoginHome.setOnClickListener(this);

        Reg = findViewById(R.id.daftar);
        Reg.setOnClickListener(this);

        LupaPw = findViewById(R.id.lupa_kata_s);
        LupaPw.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.button:
                email = getEmail.getText().toString();
                pass = getPassword.getText().toString();
                login(email,pass);
                break;
            case R.id.daftar:
                Intent intent = new Intent(this, register.class);
                startActivity(intent);
                break;
            case R.id.lupa_kata_s:
                Intent intent1 = new Intent(this, resetpassword.class);
                startActivity(intent1);
                break;
        }
    }

    public void notif(Activity activity){
        //change color notif bar
        Window window = this.getWindow();
        window.addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS);
        window.clearFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
        window.setStatusBarColor(this.getResources().getColor(R.color.coklat));
        //set icons notifbar
        View decor = activity.getWindow().getDecorView();
        decor.setSystemUiVisibility(View.SYSTEM_UI_FLAG_LIGHT_STATUS_BAR);
    }
    private void login(String email, String pass) {

        if(email.equals("") || pass.equals("")){
            Toast.makeText(login.this, "Mohon isi semua data",Toast.LENGTH_LONG).show();


        } else {
            apiInterface = ApiClient.getClient().create(ApiInterface.class);
            Call<Login> loginCall = apiInterface.loginResponse(email,pass);
            loginCall.enqueue(new Callback<Login>() {
                @Override
                public void onResponse(Call<Login> call, Response<Login> response) {
                    if(response.body() != null && response.isSuccessful() && response.body().isStatus()){


                        //Ini untuk pindah
                        Toast.makeText(login.this, response.body().getData().getNama(), Toast.LENGTH_SHORT).show();
                        System.out.println("nama saya adalah"+response.body().getData().getNama());
                        Intent intent = new Intent(login.this, home.class);
                        intent.putExtra("namaUser",response.body().getData().getNama());
                        startActivity(intent);
                        finish();

                    }else{
                        Toast.makeText(login.this, response.body().getMessage(), Toast.LENGTH_SHORT).show();

                    }
                }

                @Override
                public void onFailure(Call<Login> call, Throwable t) {
                    Toast.makeText(login.this, t.getLocalizedMessage(), Toast.LENGTH_SHORT).show();
                }
            });
        }

    }
}