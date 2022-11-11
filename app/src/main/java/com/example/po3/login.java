package com.example.po3;

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

public class login extends AppCompatActivity {
    TextView Reg, LupaPw;
    EditText getEmail, getPassword;
    Button toLoginHome;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        signUp();
        lupaPassword();
        LogintoHome();
        notif(login.this);
    }

    public void signUp(){
        Reg = (TextView) findViewById(R.id.daftar);
        Reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getApplicationContext(),register.class);
                startActivity(intent);
            }
        });
    }
    public void lupaPassword(){
        LupaPw = (TextView) findViewById(R.id.lupa_kata_s);
        LupaPw.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getApplicationContext(),resetpassword.class);
                startActivity(i);
            }
        });
    }
    public void LogintoHome(){
        toLoginHome = (Button) findViewById(R.id.button);
        toLoginHome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(getApplicationContext(),home.class);
                startActivity(i);
            }
        });
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
}