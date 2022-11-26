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

import com.example.po3.API.ApiClient;
import com.example.po3.API.ApiInterface;
import com.example.po3.R;
import com.example.po3.model.login.register.Register;
import com.example.po3.validasi;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class register extends AppCompatActivity implements View.OnClickListener {
    Button Daftar;
    TextView tologin;
    EditText nama, email, katasandi, confirm;
    String TextNama, TextEmail, TextKataSandi, Textconfirm;
    ApiInterface apiInterface;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        notif(register.this);

        nama = findViewById(R.id.namalengkap);
        email = findViewById(R.id.eimail);
        katasandi = findViewById(R.id.puasword);
        confirm = findViewById(R.id.puasword1);
        Daftar = findViewById(R.id.reg);
        Daftar.setOnClickListener(this);

        tologin = findViewById(R.id.masuk);
        tologin.setOnClickListener(this);

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

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.reg:
                TextNama = nama.getText().toString();
                TextEmail = email.getText().toString();
                TextKataSandi = katasandi.getText().toString();
                register(TextNama, TextEmail, TextKataSandi);
                break;
            case R.id.masuk:
                Intent intent = new Intent(this, login.class);
                startActivity(intent);
                finish();
                break;
        }
    }

    private void register(String textNama, String textEmail, String textKataSandi){
        String matchPw = confirm.getText().toString();
        String emailPattern = "^[\\w!#$%&'+/=?`{|}~^-]+(?:\\.[\\w!#$%&'+/=?`{|}~^-]+)*@(?:[a-zA-Z0-9-]+\\.)+[a-zA-Z]{2,6}";

        if(TextNama.equals("") || TextEmail.equals("") || TextKataSandi.equals("")){
            Toast.makeText(register.this, "Mohon Lengkapi Data terlebih dahulu", Toast.LENGTH_LONG).show();

        }else if(!TextEmail.matches(emailPattern)||!TextEmail.contains("@gmail.com")){
            Toast.makeText(register.this, "Email tidak valid", Toast.LENGTH_LONG).show();
        }else if (matchPw.equals(TextKataSandi)){

            apiInterface = ApiClient.getClient().create(ApiInterface.class);
            Call<Register> call = apiInterface.registerResponse(textNama, textEmail, textKataSandi);
            call.enqueue(new Callback<Register>() {
                @Override
                public void onResponse(Call<Register> call, Response<Register> response) {
                    int kode = response.body().getKode();
                    if (kode == 1){
                        Toast.makeText(register.this,"Berhasil Daftar",Toast.LENGTH_SHORT).show();
                        Intent i = new Intent(getApplicationContext(), validasi.class);
                        String id = String.valueOf(response.body().getData().getIdUser());
                        System.out.println("ID USERNYA PADA REGIST "+id);
                        i.putExtra("Userid",id);
                        i.putExtra("EmailUser",textEmail);
                        startActivity(i);
                    } else if(kode == 3){
                        Toast.makeText(register.this,"Email Already Exist",Toast.LENGTH_SHORT).show();
                    }else {
                        Toast.makeText(register.this,"Gagal Daftar",Toast.LENGTH_SHORT).show();
                    }
                }

                @Override
                public void onFailure(Call<Register> call, Throwable t) {
                    Toast.makeText(register.this, t.getLocalizedMessage(), Toast.LENGTH_SHORT).show();

                }
            });

        } else{

            Toast.makeText(register.this, "Kata Sandi Tidak Cocok", Toast.LENGTH_SHORT).show();
        }
        }
    }
