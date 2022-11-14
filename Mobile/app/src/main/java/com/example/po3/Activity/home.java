package com.example.po3.Activity;

import androidx.appcompat.app.AppCompatActivity;
import androidx.viewpager.widget.ViewPager;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;

import com.example.po3.R;
import com.example.po3.adapter;
import com.google.android.material.tabs.TabLayout;

public class home extends AppCompatActivity {

    private TabLayout tabLayout;
    private ViewPager viewPager;
    private home1 home_fragment;
    private favorit favorit_fragment;
    private notif notif_fragment;
    private user user_fragment;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        switchMenu();
        notif(home.this);
    }

    public void switchMenu(){
        tabLayout = findViewById(R.id.tab);
        viewPager = findViewById(R.id.viewPager);

        tabLayout.setupWithViewPager(viewPager);

        adapter swtch = new adapter(getSupportFragmentManager(), 0);
        swtch.addFragment(new home1(),"");
        swtch.addFragment(new favorit(),"");
        swtch.addFragment(new notif(),"");
        swtch.addFragment(new user(),"");
        viewPager.setAdapter(swtch);

        tabLayout.getTabAt(0).setIcon(R.drawable.home);
        tabLayout.getTabAt(1).setIcon(R.drawable.heart);
        tabLayout.getTabAt(2).setIcon(R.drawable.bell);
        tabLayout.getTabAt(3).setIcon(R.drawable.user);

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