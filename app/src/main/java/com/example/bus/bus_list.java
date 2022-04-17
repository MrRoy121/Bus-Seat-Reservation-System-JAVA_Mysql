package com.example.bus;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.bus.Bus_seats.seat_38;
import com.example.bus.Bus_seats.seat_71;
import com.example.bus.Connection.Buslist;
import com.example.bus.Connection.Buslist_Adapter;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class bus_list extends AppCompatActivity implements Buslist_Adapter.OnItemClickListener {

    private static final String URL_BUS = "http://192.168.0.101/project/availbus.php?route=";
    public static final String Route = "route";
    public static final String BusID = "busid";
    public static final String Seatcount = "seatcount";
    public static final String Bookedseat = "bookedseat";
    public static final String DriverID = "driverid";
    public static final String Time = "time";
    public static final String Date = "date";


    List<Buslist> buslist;
    private RequestQueue mRequestQueue;
    private Buslist_Adapter bAdapter;
    private RecyclerView mRecyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_bus_list);

        mRecyclerView = findViewById(R.id.recylcerView);
        mRecyclerView.setHasFixedSize(true);
        mRecyclerView.setLayoutManager(new LinearLayoutManager(this));
        buslist = new ArrayList<>();
        mRequestQueue = Volley.newRequestQueue(this);
        parseJSON();
        Bundle bundle = getIntent().getExtras();
        String route = bundle.getString("R");
    }

    private void parseJSON() {
        Bundle bundle = getIntent().getExtras();
        String route = bundle.getString("R");
        String url = URL_BUS+route;

        StringRequest request = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String products) {
                        try {
                            JSONArray jsonArray = new JSONArray(products);

                            for (int i = 0; i < jsonArray.length(); i++) {

                                JSONObject hit = jsonArray.getJSONObject(i);

                                String route = hit.getString("route");
                                String busid = hit.getString("busid");
                                String seatcount = hit.getString("seatcount");
                                String bookedseats = hit.getString("bookedseats");
                                String driverid = hit.getString("driverid");
                                String time = hit.getString("time");
                                String date = hit.getString("date");
                                buslist.add(new Buslist(route, busid, seatcount, bookedseats, driverid, time, date));

                            }
                            bAdapter = new Buslist_Adapter(bus_list.this, buslist);
                            mRecyclerView.setAdapter(bAdapter);
                            bAdapter.setOnItemClickListener(bus_list.this);
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

        Buslist clickedItem = buslist.get(position);
        String seat = clickedItem.getSeatcount();
        if(seat.equals("38")){
            Intent detailIntent = new Intent(this, seat_38.class);
            detailIntent.putExtra(Route, clickedItem.getRoute());
            detailIntent.putExtra(BusID, clickedItem.getBusid());
            detailIntent.putExtra(Seatcount, clickedItem.getSeatcount());
            detailIntent.putExtra(DriverID, clickedItem.getDriverid());
            detailIntent.putExtra(Time, clickedItem.getTime());
            detailIntent.putExtra(Date, clickedItem.getDate());
            startActivity(detailIntent);
        }else if (seat.equals("71")){
            Intent detailIntent = new Intent(this, seat_71.class);
            detailIntent.putExtra(Route, clickedItem.getRoute());
            detailIntent.putExtra(BusID, clickedItem.getBusid());
            detailIntent.putExtra(Seatcount, clickedItem.getSeatcount());
            detailIntent.putExtra(DriverID, clickedItem.getDriverid());
            detailIntent.putExtra(Time, clickedItem.getTime());
            detailIntent.putExtra(Date, clickedItem.getDate());
            startActivity(detailIntent);
        }
    }
}