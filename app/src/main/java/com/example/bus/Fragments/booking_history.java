package com.example.bus.Fragments;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.Gravity;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.bus.Connection.History;
import com.example.bus.Connection.History_Adapter;
import com.example.bus.MainActivity;
import com.example.bus.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class booking_history extends AppCompatActivity  implements History_Adapter.OnItemClickListener {


    public static final String ID1 = "ID";
    public static final String MY_PREFERENCES = "MyPrefs";
    SharedPreferences sharedPreferences;
    String busid, seat1, seat2, time, date, from;
    public static final String STATS = "stats";
    String URL_RUNNINGHISTORY = "http://192.168.0.101/pr/runninghistory.php?studentid=";
    private static final String URL_HISTORY = "http://192.168.0.101/pr/checkhistory.php?id=";
    List<History> historyList;
    private RequestQueue mRequestQueue;
    private History_Adapter pAdapter;
    private RecyclerView mRecyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_booking_history);



        mRecyclerView = findViewById(R.id.recylcerView);
        mRecyclerView.setHasFixedSize(true);
        mRecyclerView.setLayoutManager(new LinearLayoutManager(this));

        historyList = new ArrayList<>();


        mRequestQueue = Volley.newRequestQueue(this);
        historyJSON();

        Button home;
        home = findViewById(R.id.btn);
        home.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(booking_history.this, MainActivity.class);
                startActivity(i);
            }
        });

        CardView cardView;
        LinearLayout layout;
        cardView = findViewById(R.id.running);
        layout = findViewById(R.id.runninglayout);

        sharedPreferences = getSharedPreferences(MY_PREFERENCES, Context.MODE_PRIVATE);
        String stats = sharedPreferences.getString(STATS, "");

        if (stats.equals("1")){
            cardView.setVisibility(View.VISIBLE);
            layout.setVisibility(View.VISIBLE);
        }
        TextView t1r, t2r, t3r, t4r, t5r, t6r;

        t1r = findViewById(R.id.trun);
        t2r = findViewById(R.id.drun);
        t3r = findViewById(R.id.bidrun);
        t4r = findViewById(R.id.s1run);
        t5r = findViewById(R.id.s2run);
        t6r = findViewById(R.id.prun);



        RequestQueue mRequestQueu = Volley.newRequestQueue(this);

        sharedPreferences = getSharedPreferences(MY_PREFERENCES, Context.MODE_PRIVATE);
        String id = sharedPreferences.getString(ID1, "");

        String url = URL_RUNNINGHISTORY+id;


        ProgressDialog pdLoading = new ProgressDialog(booking_history.this);
        pdLoading.setMessage("\tLoading...");
        pdLoading.setCancelable(false);
        pdLoading.show();

        StringRequest request = new StringRequest(Request.Method.GET, url,
                products -> {

                    pdLoading.dismiss();
                    try {
                        JSONArray jsonArray = new JSONArray(products);

                        SharedPreferences sharedPref = getSharedPreferences("details", MODE_PRIVATE);
                        SharedPreferences.Editor editor = sharedPref.edit();

                        if(jsonArray.length()==2){
                            for (int i = 0; i < 1; i++) {
                                JSONObject hit = jsonArray.getJSONObject(i);

                                busid = hit.getString("busid");
                                time = hit.getString("time");
                                from = hit.getString("frm");
                                date = hit.getString("date");
                                seat1 = hit.getString("seat");


                                t1r.setText(time);
                                t2r.setText(date);
                                t3r.setText(busid);
                                t4r.setText(seat1);
                                t6r.setText(from);
                            }
                            for (int i = 1; i < 2; i++) {
                                JSONObject hit = jsonArray.getJSONObject(i);
                                seat2 = hit.getString("seat");
                                t5r.setText(seat2);

                            }}
                        else{
                            for (int i = 0; i < 1; i++) {
                                JSONObject hit = jsonArray.getJSONObject(i);

                                String busid = hit.getString("busid");
                                String time = hit.getString("time");
                                String from = hit.getString("frm");
                                String date = hit.getString("date");

                                String seat1 = hit.getString("seat");
                                t1r.setText(time);
                                t2r.setText(date);
                                t3r.setText(busid);
                                t4r.setText(seat1);
                                t6r.setText(from);
                            }
                        }
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();

                pdLoading.dismiss();
            }
        });
        mRequestQueu.add(request);



        Button details = findViewById(R.id.details);
        details.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                LayoutInflater inflater = getLayoutInflater();
                View layout = inflater.inflate(R.layout.custom_toast, (ViewGroup) findViewById(R.id.custom_toast_layout));
                TextView tbusid = (TextView) layout.findViewById(R.id.busid);
                TextView ttime = (TextView) layout.findViewById(R.id.time);
                TextView tdate = (TextView) layout.findViewById(R.id.date);
                TextView tfrom = (TextView) layout.findViewById(R.id.from);
                TextView tseat1 = (TextView) layout.findViewById(R.id.seat1);
                TextView tseat2 = (TextView) layout.findViewById(R.id.seat2);

                tbusid.setText(busid);
                ttime.setText(time);
                tdate.setText(date);
                tfrom.setText(from);
                tseat1.setText(seat1);
                tseat2.setText(seat2);

                Toast toast = new Toast(getApplicationContext());
                toast.setGravity(Gravity.CENTER_VERTICAL, 0, 100);
                toast.setDuration(Toast.LENGTH_LONG);
                toast.setView(layout);
                toast.show();
            }
        });
    }


    private void historyJSON() {


        sharedPreferences = getSharedPreferences(MY_PREFERENCES, Context.MODE_PRIVATE);
        String id = sharedPreferences.getString(ID1, "");
        String url = URL_HISTORY+id;

        StringRequest request = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String products) {
                        try {
                            JSONArray jsonArray = new JSONArray(products);

                            for (int i = 0; i < jsonArray.length(); i++) {

                                JSONObject hit = jsonArray.getJSONObject(i);

                                String busid = hit.getString("busid");
                                String seat = hit.getString("seat");
                                String from = hit.getString("from");
                                String time = hit.getString("time");
                                String date = hit.getString("date");
                                historyList.add(new History(busid, seat, from, time, date));

                            }
                            pAdapter = new History_Adapter(booking_history.this, historyList);
                            mRecyclerView.setAdapter(pAdapter);
                            pAdapter.setOnItemClickListener(booking_history.this);
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        });
        mRequestQueue.add(request);
    }

    @Override
    public void onItemClick(int position) {
        History clickedItem = historyList.get(position);
        LayoutInflater inflater = getLayoutInflater();

        View layout = inflater.inflate(R.layout.custom_toast1, (ViewGroup) findViewById(R.id.custom_toast_layout));
        TextView tbusid = (TextView) layout.findViewById(R.id.busid);
        TextView ttime = (TextView) layout.findViewById(R.id.time);
        TextView tdate = (TextView) layout.findViewById(R.id.date);
        TextView tfrom = (TextView) layout.findViewById(R.id.from);
        TextView tseat = (TextView) layout.findViewById(R.id.seat);

        tbusid.setText(clickedItem.getBusid());
        ttime.setText(clickedItem.getTime());
        tdate.setText(clickedItem.getDate());
        tfrom.setText(clickedItem.getFrom());
        tseat.setText(clickedItem.getSeat());

        Toast toast = new Toast(getApplicationContext());
        toast.setGravity(Gravity.CENTER_VERTICAL, 0, 100);
        toast.setDuration(Toast.LENGTH_LONG);
        toast.setView(layout);
        toast.show();
    }
}