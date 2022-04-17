package com.example.bus;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.RelativeLayout;

public class route_select extends AppCompatActivity {
    RelativeLayout r1, r2, r3, r4;

    public String r = "a";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_route_select);


        r1 = (RelativeLayout) findViewById(R.id.r1);
        r2 = (RelativeLayout) findViewById(R.id.r2);
        r3 = (RelativeLayout) findViewById(R.id.r3);
        r4 = (RelativeLayout) findViewById(R.id.r4);

        r1.setOnClickListener(v -> {
            r = "01";
            Intent intent = new Intent(route_select.this, bus_list.class);
            intent.putExtra("R", r);
            startActivity(intent);
        });

        r2.setOnClickListener(v -> {
            r = "02";
            Intent intent = new Intent(route_select.this, bus_list.class);
            intent.putExtra("R", r);
            startActivity(intent);
        });

        r3.setOnClickListener(v -> {
            r = "03";
            Intent intent = new Intent(route_select.this, bus_list.class);
            intent.putExtra("R", r);
            startActivity(intent);
        });

        r4.setOnClickListener(v -> {
            r = "04";
            Intent intent = new Intent(route_select.this, bus_list.class);
            intent.putExtra("R", r);
            startActivity(intent);
        });

    }

}