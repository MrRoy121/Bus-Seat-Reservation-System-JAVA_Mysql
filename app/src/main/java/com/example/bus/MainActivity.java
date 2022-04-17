package com.example.bus;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.Bundle;
import android.view.Gravity;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.bus.Connection.PrefManager;
import com.example.bus.Fragments.about_developers;
import com.example.bus.Fragments.booking_history;
import com.example.bus.Fragments.privacy_policy;
import com.example.bus.Fragments.usr_details;
import com.google.android.material.navigation.NavigationView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class MainActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {



    String URL_CHECKRESERVE = "http://192.168.0.101/pr/checkreserve.php?studentid=", stats = "0";

    public static final String USERNAME = "username";
    public static final String ID1 = "ID";

    public static final String MY_PREFERENCES = "MyPrefs";
    public static final String STATUS = "status";
    SharedPreferences sharedPreferences;
    private boolean status;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        Button track = findViewById(R.id.track);

        Button home_login = findViewById(R.id.home_login);

        PrefManager prefManager = new PrefManager(getApplicationContext());
        if (prefManager.isFirstTimeLaunch()) {
            prefManager.setFirstTimeLaunch(false);
            startActivity(new Intent(MainActivity.this, welcome.class));
            finish();
        }

        Button b = (Button) findViewById(R.id.reserve);
        sharedPreferences = getSharedPreferences(MY_PREFERENCES, Context.MODE_PRIVATE);
        status = sharedPreferences.getBoolean(STATUS, false);

        statscheck();


        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(stats.equals("0")){
                    Intent intent = new Intent(MainActivity.this, route_select.class);
                    startActivity(intent);
                }else{
                    Intent i = new Intent(MainActivity.this, booking_history.class);
                    startActivity(i);
                }
            }
        });


        track.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(MainActivity.this, MapsActivity.class);
                startActivity(intent);
            }
        });


        home_login.setOnClickListener(new View.OnClickListener() {
            public void onClick(View view) {

                Intent userloginIntent = new Intent(getApplicationContext(), usr_login.class);
                startActivity(userloginIntent);
            }
        });


        final DrawerLayout drawer = findViewById(R.id.my_drawer_layout);
        ImageView menuIcon = (ImageView) findViewById(R.id.menu_icon);

        if (status) {
            home_login.setVisibility(View.INVISIBLE);
            menuIcon.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    drawer.openDrawer(Gravity.LEFT);
                }
            });

        } else {
            menuIcon.setVisibility(View.INVISIBLE);
            toastMsg("Please Login First");
        }

        NavigationView navigationView = findViewById(R.id.navview);
        navigationView.setNavigationItemSelectedListener(this);

        View headerView = navigationView.getHeaderView(0);
        TextView navUsername = (TextView) headerView.findViewById(R.id.tid1);
        TextView navUserID = (TextView) headerView.findViewById(R.id.sid2);
        navUsername.setText(sharedPreferences.getString(USERNAME, ""));
        navUserID.setText(sharedPreferences.getString(ID1, ""));

    }

    private void statscheck() {

        RequestQueue mRequestQueu = Volley.newRequestQueue(this);

        sharedPreferences = getSharedPreferences(MY_PREFERENCES, Context.MODE_PRIVATE);
        String id = sharedPreferences.getString(ID1, "");

        String url = URL_CHECKRESERVE+id;

        StringRequest request = new StringRequest(Request.Method.GET, url,
                products -> {
                    try {
                        JSONArray jsonArray = new JSONArray(products);

                        for (int i = 0; i < jsonArray.length(); i++) {

                            JSONObject hit = jsonArray.getJSONObject(i);

                            stats = hit.getString("stats");

                        }
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        });
        mRequestQueu.add(request);

    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = findViewById(R.id.my_drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.navigation, menu);
        return true;
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id==R.id.logout){

            SharedPreferences.Editor editor = sharedPreferences.edit();
            editor.clear();
            editor.putBoolean(STATUS, false);
            editor.apply();
            finish();
            Intent intent = new Intent(MainActivity.this, usr_login.class);
            startActivity(intent);
        } else if (id==R.id.account) {

            Intent intent = new Intent(MainActivity.this, usr_details.class);
            startActivity(intent);
        } else if (id==R.id.bookings) {

            Intent intent = new Intent(MainActivity.this, booking_history.class);
            startActivity(intent);
        } else if (id==R.id.web) {

            Intent intent = new Intent();
            intent.setAction(Intent.ACTION_VIEW);
            intent.addCategory(Intent.CATEGORY_BROWSABLE);
            intent.setData(Uri.parse("https://www.lus.ac.bd/"));
            startActivity(intent);

        } else if (id==R.id.dweb) {

            Intent intent = new Intent();
            intent.setAction(Intent.ACTION_VIEW);
            intent.addCategory(Intent.CATEGORY_BROWSABLE);
            intent.setData(Uri.parse("https://www.lus.ac.bd/author/saidur/"));
            startActivity(intent);
        }
        DrawerLayout drawer = findViewById(R.id.my_drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
    public void toastMsg(String msg) {
        Toast toast = Toast.makeText(this, msg, Toast.LENGTH_LONG);
        toast.show();
    }


    public void privacy(View v){
        Intent intent = new Intent(MainActivity.this, privacy_policy.class);
        startActivity(intent);
    }

    public void aboutdevs(View v){

        Intent intent = new Intent(MainActivity.this, about_developers.class);
        startActivity(intent);
    }
}