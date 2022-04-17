package com.example.bus.Bus_seats;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.RadioGroup;
import android.widget.TextView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.bus.Fragments.bus_info;
import com.example.bus.Fragments.driver_info;
import com.example.bus.R;
import com.example.bus.ticket;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import static com.example.bus.bus_list.BusID;
import static com.example.bus.bus_list.Date;
import static com.example.bus.bus_list.Time;
import static com.example.bus.bus_list.Route;

public class seat_71 extends AppCompatActivity {

    CheckBox m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, a1, b1, c1, d1, a2, b2, c2, d2, a3, b3, c3, d3, a4, b4, c4, d4, a5, b5, c5, d5, a6, b6, c6, d6, a7, b7, c7, d7, a8, b8, c8, d8, a9, b9, c9, d9, b, c, e1, e2, e3, e4, e5, e6, e7, e8, e9, e10, e11, e12, e13, e14, a10, a11, a12, a13, a14, b10, b11, b12, b13, b14, c10, c11, c12, c13, c14, d10, d11, d12, d13, d14;
    int numberOfCheckboxesChecked = 0;
    String from, seat1 = "", seat2 = "", at;
    String URL_CHECKSEAT = "http://192.168.0.101/project/checkseat.php?route=";
    private RequestQueue mRequestQueue;

    TextView tt1, tt2, tt3,tt4, tt5, tt6, tt7, tt8, tt9, tt10, pt1, pt2, pt3, pt4, pt5, pt6, pt7, pt8, pt9, pt10;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_seat71);


        Button book = findViewById(R.id.book);
        Button businfo = findViewById(R.id.businfo);
        Button driverinfo = findViewById(R.id.driverinfo);

        Intent intent = getIntent();
        String route = intent.getStringExtra(Route);
        String busid = intent.getStringExtra(BusID);
        //String seatcount = intent.getStringExtra(Seatcount);
        //String driverid = intent.getStringExtra(DriverID);
        String time = intent.getStringExtra(Time);
        String date = intent.getStringExtra(Date);


        TextView troute = findViewById(R.id.route);
        TextView tbusid = findViewById(R.id.busid);
        //TextView tseatcount = findViewById(R.id.seatcount);
        //TextView tdriverid = findViewById(R.id.driverid);
        TextView ttime = findViewById(R.id.time);
        TextView tdate = findViewById(R.id.date);


        troute.setText(route);
        tbusid.setText(busid);
        ttime.setText(time);
        tdate.setText(date);


        //textViewLikes.setText(seatcount);
        //imageView1.setText(driverid);

        {
            m1 = (CheckBox) findViewById(R.id.ma);
            m2 = (CheckBox) findViewById(R.id.mb);
            m3 = (CheckBox) findViewById(R.id.mc);
            m4 = (CheckBox) findViewById(R.id.md);
            m5 = (CheckBox) findViewById(R.id.me);
            m6 = (CheckBox) findViewById(R.id.mf);
            m7 = (CheckBox) findViewById(R.id.mg);
            m8 = (CheckBox) findViewById(R.id.mh);
            m9 = (CheckBox) findViewById(R.id.mi);
            m10 = (CheckBox) findViewById(R.id.mj);

            tt1 = (TextView) findViewById(R.id.t1);
            tt2 = (TextView) findViewById(R.id.t2);
            tt3 = (TextView) findViewById(R.id.t3);
            tt4 = (TextView) findViewById(R.id.t4);
            tt5 = (TextView) findViewById(R.id.t5);
            tt6 = (TextView) findViewById(R.id.t6);
            tt7 = (TextView) findViewById(R.id.t7);
            tt8 = (TextView) findViewById(R.id.t8);
            tt9 = (TextView) findViewById(R.id.t9);
            tt10 = (TextView) findViewById(R.id.t10);
            pt1 = (TextView) findViewById(R.id.p1);
            pt2 = (TextView) findViewById(R.id.p2);
            pt3 = (TextView) findViewById(R.id.p3);
            pt4 = (TextView) findViewById(R.id.p4);
            pt5 = (TextView) findViewById(R.id.p5);
            pt6 = (TextView) findViewById(R.id.p6);
            pt7 = (TextView) findViewById(R.id.p7);
            pt8 = (TextView) findViewById(R.id.p8);
            pt9 = (TextView) findViewById(R.id.p9);
            pt10 = (TextView) findViewById(R.id.p10);

            a1 = (CheckBox) findViewById(R.id.a1);
            b1 = (CheckBox) findViewById(R.id.b1);
            c1 = (CheckBox) findViewById(R.id.c1);
            d1 = (CheckBox) findViewById(R.id.d1);
            a2 = (CheckBox) findViewById(R.id.a2);
            b2 = (CheckBox) findViewById(R.id.b2);
            c2 = (CheckBox) findViewById(R.id.c2);
            d2 = (CheckBox) findViewById(R.id.d2);
            a3 = (CheckBox) findViewById(R.id.a3);
            b3 = (CheckBox) findViewById(R.id.b3);
            c3 = (CheckBox) findViewById(R.id.c3);
            d3 = (CheckBox) findViewById(R.id.d3);
            a4 = (CheckBox) findViewById(R.id.a4);
            b4 = (CheckBox) findViewById(R.id.b4);
            c4 = (CheckBox) findViewById(R.id.c4);
            d4 = (CheckBox) findViewById(R.id.d4);
            a5 = (CheckBox) findViewById(R.id.a5);
            b5 = (CheckBox) findViewById(R.id.b5);
            c5 = (CheckBox) findViewById(R.id.c5);
            d5 = (CheckBox) findViewById(R.id.d5);
            a6 = (CheckBox) findViewById(R.id.a6);
            b6 = (CheckBox) findViewById(R.id.b6);
            c6 = (CheckBox) findViewById(R.id.c6);
            d6 = (CheckBox) findViewById(R.id.d6);
            a7 = (CheckBox) findViewById(R.id.a7);
            b7 = (CheckBox) findViewById(R.id.b7);
            c7 = (CheckBox) findViewById(R.id.c7);
            d7 = (CheckBox) findViewById(R.id.d7);
            a8 = (CheckBox) findViewById(R.id.a8);
            b8 = (CheckBox) findViewById(R.id.b8);
            c8 = (CheckBox) findViewById(R.id.c8);
            d8 = (CheckBox) findViewById(R.id.d8);
            a9 = (CheckBox) findViewById(R.id.a9);
            b9 = (CheckBox) findViewById(R.id.b9);
            c9 = (CheckBox) findViewById(R.id.c9);
            d9 = (CheckBox) findViewById(R.id.d9);
            b = (CheckBox) findViewById(R.id.b);
            c = (CheckBox) findViewById(R.id.c);
            a10 = (CheckBox) findViewById(R.id.a10);
            b10 = (CheckBox) findViewById(R.id.b10);
            c10 = (CheckBox) findViewById(R.id.c10);
            d10 = (CheckBox) findViewById(R.id.d10);
            a11 = (CheckBox) findViewById(R.id.a11);
            b11 = (CheckBox) findViewById(R.id.b11);
            c11 = (CheckBox) findViewById(R.id.c11);
            d11 = (CheckBox) findViewById(R.id.d11);
            a12 = (CheckBox) findViewById(R.id.a12);
            b12 = (CheckBox) findViewById(R.id.b12);
            c12 = (CheckBox) findViewById(R.id.c12);
            d12 = (CheckBox) findViewById(R.id.d12);
            a13 = (CheckBox) findViewById(R.id.a13);
            b13 = (CheckBox) findViewById(R.id.b13);
            c13 = (CheckBox) findViewById(R.id.c13);
            d13 = (CheckBox) findViewById(R.id.d13);
            a14 = (CheckBox) findViewById(R.id.a14);
            b14 = (CheckBox) findViewById(R.id.b14);
            c14 = (CheckBox) findViewById(R.id.c14);
            d14 = (CheckBox) findViewById(R.id.d14);
            e1 = (CheckBox) findViewById(R.id.e1);
            e2 = (CheckBox) findViewById(R.id.e2);
            e3 = (CheckBox) findViewById(R.id.e3);
            e4 = (CheckBox) findViewById(R.id.e4);
            e5 = (CheckBox) findViewById(R.id.e5);
            e6 = (CheckBox) findViewById(R.id.e6);
            e7 = (CheckBox) findViewById(R.id.e7);
            e8 = (CheckBox) findViewById(R.id.e8);
            e9 = (CheckBox) findViewById(R.id.e9);
            e10 = (CheckBox) findViewById(R.id.e10);
            e11 = (CheckBox) findViewById(R.id.e11);
            e12 = (CheckBox) findViewById(R.id.e12);
            e13 = (CheckBox) findViewById(R.id.e13);
            e14 = (CheckBox) findViewById(R.id.e14);
        }

        book.setOnClickListener(new View.OnClickListener() {
            public void onClick(View view) {

                Intent intent = new Intent(getApplicationContext(), com.example.bus.ticket.class);
                intent.putExtra("From", from);
                intent.putExtra("At", at);
                intent.putExtra("Seat1", seat1);
                intent.putExtra("Seat2", seat2);
                intent.putExtra("route", route);
                intent.putExtra("busid", busid);
                intent.putExtra("time", time);
                intent.putExtra("date", date);
                startActivity(intent);
            }
        });
        businfo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(seat_71.this, bus_info.class);
                startActivity(intent);
            }
        });
        driverinfo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent = new Intent(seat_71.this, driver_info.class);
                startActivity(intent);
            }
        });


        mRequestQueue = Volley.newRequestQueue(this);

        String url = URL_CHECKSEAT+route+"&busid="+busid;

        StringRequest request = new StringRequest(Request.Method.GET, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String products) {
                        try {
                            JSONArray jsonArray = new JSONArray(products);

                            for (int i = 0; i < jsonArray.length(); i++) {

                                JSONObject hit = jsonArray.getJSONObject(i);

                                String seat = hit.getString("seat");

                                if (seat.equals("a1")) {
                                    a1.setBackgroundResource(R.drawable.seat_booked);
                                    a1.setEnabled(false);
                                }
                                if (seat.equals("b1")) {
                                    b1.setBackgroundResource(R.drawable.seat_booked);
                                    b1.setEnabled(false);
                                }
                                if (seat.equals("c1")) {
                                    c1.setBackgroundResource(R.drawable.seat_booked);
                                    c1.setChecked(false);
                                }
                                if (seat.equals("d1")) {
                                    d1.setBackgroundResource(R.drawable.seat_booked);
                                    d1.setChecked(false);
                                }
                                if (seat.equals("a2")) {
                                    a2.setBackgroundResource(R.drawable.seat_booked);
                                    a2.setChecked(false);
                                }
                                if (seat.equals("b2")) {
                                    b2.setBackgroundResource(R.drawable.seat_booked);
                                    b2.setEnabled(false);
                                }
                                if (seat.equals("c2")) {
                                    c2.setBackgroundResource(R.drawable.seat_booked);
                                    c2.setChecked(false);
                                }
                                if (seat.equals("d2")) {
                                    d2.setBackgroundResource(R.drawable.seat_booked);
                                    d2.setChecked(false);
                                }
                                if (seat.equals("a3")) {
                                    a3.setBackgroundResource(R.drawable.seat_booked);
                                    a3.setEnabled(false);
                                }
                                if (seat.equals("b3")) {
                                    b3.setBackgroundResource(R.drawable.seat_booked);
                                    b3.setEnabled(false);
                                }
                                if (seat.equals("c3")) {
                                    c3.setBackgroundResource(R.drawable.seat_booked);
                                    c3.setChecked(false);
                                }
                                if (seat.equals("d3")) {
                                    d3.setBackgroundResource(R.drawable.seat_booked);
                                    d3.setChecked(false);
                                }
                                if (seat.equals("a4")) {
                                    a4.setBackgroundResource(R.drawable.seat_booked);
                                    a4.setEnabled(false);
                                }
                                if (seat.equals("b4")) {
                                    b4.setBackgroundResource(R.drawable.seat_booked);
                                    b4.setEnabled(false);
                                }
                                if (seat.equals("c4")) {
                                    c4.setBackgroundResource(R.drawable.seat_booked);
                                    c4.setChecked(false);
                                }
                                if (seat.equals("d4")) {
                                    d4.setBackgroundResource(R.drawable.seat_booked);
                                    d4.setChecked(false);
                                }
                                if (seat.equals("a5")) {
                                    a5.setBackgroundResource(R.drawable.seat_booked);
                                    a5.setEnabled(false);
                                }
                                if (seat.equals("b5")) {
                                    b5.setBackgroundResource(R.drawable.seat_booked);
                                    b5.setEnabled(false);
                                }
                                if (seat.equals("c5")) {
                                    c5.setBackgroundResource(R.drawable.seat_booked);
                                    c5.setChecked(false);
                                }
                                if (seat.equals("d5")) {
                                    d5.setBackgroundResource(R.drawable.seat_booked);
                                    d5.setChecked(false);
                                }
                                if (seat.equals("a6")) {
                                    a6.setBackgroundResource(R.drawable.seat_booked);
                                    a6.setEnabled(false);
                                }
                                if (seat.equals("b6")) {
                                    b6.setBackgroundResource(R.drawable.seat_booked);
                                    b6.setEnabled(false);
                                }
                                if (seat.equals("c6")) {
                                    c6.setBackgroundResource(R.drawable.seat_booked);
                                    c6.setChecked(false);
                                }
                                if (seat.equals("d6")) {
                                    d6.setBackgroundResource(R.drawable.seat_booked);
                                    d6.setChecked(false);
                                }
                                if (seat.equals("a7")) {
                                    a7.setBackgroundResource(R.drawable.seat_booked);
                                    a7.setEnabled(false);
                                }
                                if (seat.equals("b7")) {
                                    b7.setBackgroundResource(R.drawable.seat_booked);
                                    b7.setEnabled(false);
                                }
                                if (seat.equals("c7")) {
                                    c7.setBackgroundResource(R.drawable.seat_booked);
                                    c7.setChecked(false);
                                }
                                if (seat.equals("d7")) {
                                    d7.setBackgroundResource(R.drawable.seat_booked);
                                    d7.setChecked(false);
                                }
                                if (seat.equals("a8")) {
                                    a8.setBackgroundResource(R.drawable.seat_booked);
                                    a8.setEnabled(false);
                                }
                                if (seat.equals("b8")) {
                                    b8.setBackgroundResource(R.drawable.seat_booked);
                                    b8.setEnabled(false);
                                }
                                if (seat.equals("c8")) {
                                    c8.setBackgroundResource(R.drawable.seat_booked);
                                    c8.setChecked(false);
                                }
                                if (seat.equals("d8")) {
                                    d8.setBackgroundResource(R.drawable.seat_booked);
                                    d8.setChecked(false);
                                }
                                if (seat.equals("a9")) {
                                    a9.setBackgroundResource(R.drawable.seat_booked);
                                    a9.setEnabled(false);
                                }
                                if (seat.equals("b9")) {
                                    b9.setBackgroundResource(R.drawable.seat_booked);
                                    b9.setEnabled(false);
                                }
                                if (seat.equals("c9")) {
                                    c9.setBackgroundResource(R.drawable.seat_booked);
                                    c9.setChecked(false);
                                }
                                if (seat.equals("d9")) {
                                    d9.setBackgroundResource(R.drawable.seat_booked);
                                    d9.setChecked(false);
                                }
                                if (seat.equals("b")) {
                                    b.setBackgroundResource(R.drawable.seat_booked);
                                    b.setEnabled(false);
                                }
                                if (seat.equals("c")) {
                                    c.setBackgroundResource(R.drawable.seat_booked);
                                    c.setChecked(false);
                                }
                                if (seat.equals("e1")) {
                                    e1.setBackgroundResource(R.drawable.seat_booked);
                                    e1.setEnabled(false);
                                }
                                if (seat.equals("e2")) {
                                    e2.setBackgroundResource(R.drawable.seat_booked);
                                    e2.setChecked(false);
                                }
                                if (seat.equals("e3")) {
                                    e3.setBackgroundResource(R.drawable.seat_booked);
                                    e3.setEnabled(false);
                                }
                                if (seat.equals("e4")) {
                                    e4.setBackgroundResource(R.drawable.seat_booked);
                                    e4.setEnabled(false);
                                }
                                if (seat.equals("e5")) {
                                    e5.setBackgroundResource(R.drawable.seat_booked);
                                    e5.setEnabled(false);
                                }
                                if (seat.equals("e6")) {
                                    e6.setBackgroundResource(R.drawable.seat_booked);
                                    e6.setEnabled(false);
                                }
                                if (seat.equals("e7")) {
                                    e7.setBackgroundResource(R.drawable.seat_booked);
                                    e7.setEnabled(false);
                                }
                                if (seat.equals("e8")) {
                                    e8.setBackgroundResource(R.drawable.seat_booked);
                                    e8.setEnabled(false);
                                }
                                if (seat.equals("e9")) {
                                    e9.setBackgroundResource(R.drawable.seat_booked);
                                    e9.setEnabled(false);
                                }
                                if (seat.equals("a11")) {
                                    a11.setBackgroundResource(R.drawable.seat_booked);
                                    a11.setEnabled(false);
                                }
                                if (seat.equals("b11")) {
                                    b11.setBackgroundResource(R.drawable.seat_booked);
                                    b11.setEnabled(false);
                                }
                                if (seat.equals("c11")) {
                                    c11.setBackgroundResource(R.drawable.seat_booked);
                                    c11.setChecked(false);
                                }
                                if (seat.equals("d11")) {
                                    d11.setBackgroundResource(R.drawable.seat_booked);
                                    d11.setChecked(false);
                                }
                                if (seat.equals("e11")) {
                                    e11.setBackgroundResource(R.drawable.seat_booked);
                                    e11.setEnabled(false);
                                }
                                if (seat.equals("a12")) {
                                    a12.setBackgroundResource(R.drawable.seat_booked);
                                    a12.setEnabled(false);
                                }
                                if (seat.equals("b12")) {
                                    b12.setBackgroundResource(R.drawable.seat_booked);
                                    b12.setEnabled(false);
                                }
                                if (seat.equals("c12")) {
                                    c12.setBackgroundResource(R.drawable.seat_booked);
                                    c12.setChecked(false);
                                }
                                if (seat.equals("d12")) {
                                    d12.setBackgroundResource(R.drawable.seat_booked);
                                    d12.setChecked(false);
                                }
                                if (seat.equals("e12")) {
                                    e12.setBackgroundResource(R.drawable.seat_booked);
                                    e12.setEnabled(false);
                                }
                                if (seat.equals("a13")) {
                                    a13.setBackgroundResource(R.drawable.seat_booked);
                                    a13.setEnabled(false);
                                }
                                if (seat.equals("b13")) {
                                    b13.setBackgroundResource(R.drawable.seat_booked);
                                    b13.setEnabled(false);
                                }
                                if (seat.equals("c13")) {
                                    c13.setBackgroundResource(R.drawable.seat_booked);
                                    c13.setChecked(false);
                                }
                                if (seat.equals("d13")) {
                                    d13.setBackgroundResource(R.drawable.seat_booked);
                                    d13.setChecked(false);
                                }
                                if (seat.equals("e13")) {
                                    e13.setBackgroundResource(R.drawable.seat_booked);
                                    e13.setEnabled(false);
                                }
                                if (seat.equals("a14")) {
                                    a14.setBackgroundResource(R.drawable.seat_booked);
                                    a14.setEnabled(false);
                                }
                                if (seat.equals("b14")) {
                                    b14.setBackgroundResource(R.drawable.seat_booked);
                                    b14.setEnabled(false);
                                }
                                if (seat.equals("c14")) {
                                    c14.setBackgroundResource(R.drawable.seat_booked);
                                    c14.setChecked(false);
                                }
                                if (seat.equals("d1")) {
                                    d1.setBackgroundResource(R.drawable.seat_booked);
                                    d1.setChecked(false);
                                }
                                if (seat.equals("e14")) {
                                    e14.setBackgroundResource(R.drawable.seat_booked);
                                    e14.setEnabled(false);
                                }
                            }
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
        {

            a1.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a1";
                            } else {
                                seat2 = "a1";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b1.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b1";
                            } else {
                                seat2 = "b1";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c1.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c1";
                            } else {
                                seat2 = "c1";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            d1.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "d1";
                            } else {
                                seat2 = "d1";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a2.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a2.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a2";
                            } else {
                                seat2 = "a2";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b2.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b2.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b2";
                            } else {
                                seat2 = "b2";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c2.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c2.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c2";
                            } else {
                                seat2 = "c2";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d2.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d2.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d2";
                            } else {
                                seat2 = "d2";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a3.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a3.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a3";
                            } else {
                                seat2 = "a3";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b3.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b3.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b3";
                            } else {
                                seat2 = "b3";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c3.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c3.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c3";
                            } else {
                                seat2 = "c3";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d3.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d3.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d3";
                            } else {
                                seat2 = "d3";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a4.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a4.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a4";
                            } else {
                                seat2 = "a4";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b4.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b4.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b4";
                            } else {
                                seat2 = "b4";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c4.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c4.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c4";
                            } else {
                                seat2 = "c4";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d4.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d4.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d4";
                            } else {
                                seat2 = "d4";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });


            a5.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a5.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a5";
                            } else {
                                seat2 = "a5";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b5.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b5.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b5";
                            } else {
                                seat2 = "b5";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c5.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c5.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c5";
                            } else {
                                seat2 = "c5";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d5.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d5.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d5";
                            } else {
                                seat2 = "d5";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a6.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a6.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a6";
                            } else {
                                seat2 = "a6";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b6.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b6.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b6";
                            } else {
                                seat2 = "b6";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c6.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c6.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c6";
                            } else {
                                seat2 = "c6";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d6.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d6.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d6";
                            } else {
                                seat2 = "d6";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a7.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a7.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a7";
                            } else {
                                seat2 = "a7";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });


            b7.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b7.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b7";
                            } else {
                                seat2 = "b7";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            c7.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c7.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c7";
                            } else {
                                seat2 = "c7";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d7.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d7.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d7";
                            } else {
                                seat2 = "d7";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            a8.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a8.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a8";
                            } else {
                                seat2 = "a8";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            b8.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b8.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b8";
                            } else {
                                seat2 = "b8";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            c8.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c8.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c8";
                            } else {
                                seat2 = "c8";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            d8.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d8.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d8";
                            } else {
                                seat2 = "d8";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a9.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a9.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a9";
                            } else {
                                seat2 = "a9";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b9.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b9.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b9";
                            } else {
                                seat2 = "b9";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            c9.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c9.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c9";
                            } else {
                                seat2 = "c9";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            d9.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d9.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d9";
                            } else {
                                seat2 = "d9";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            b.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b.setChecked(false);
                    } else {

                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b";
                            } else {
                                seat2 = "b";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            c.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c.setChecked(false);
                    } else {

                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c";
                            } else {
                                seat2 = "c";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }


                    }
                }
            });


            a10.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a10.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a10";
                            } else {
                                seat2 = "a10";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b10.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b10.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b10";
                            } else {
                                seat2 = "b10";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c10.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c10.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c10";
                            } else {
                                seat2 = "c10";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            d10.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d10.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "d10";
                            } else {
                                seat2 = "d10";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a11.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a11.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a11";
                            } else {
                                seat2 = "a11";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b11.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b11.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b11";
                            } else {
                                seat2 = "b11";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c11.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c11.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c11";
                            } else {
                                seat2 = "c11";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            d11.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d11.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "d11";
                            } else {
                                seat2 = "d11";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a12.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a12.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a12";
                            } else {
                                seat2 = "a12";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b12.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b12.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b12";
                            } else {
                                seat2 = "b12";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c12.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c12.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c12";
                            } else {
                                seat2 = "c12";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            d12.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d12.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "d12";
                            } else {
                                seat2 = "d12";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a13.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a13.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a13";
                            } else {
                                seat2 = "a13";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b13.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b13.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b13";
                            } else {
                                seat2 = "b13";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c13.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c13";
                            } else {
                                seat2 = "c13";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            d13.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "d13";
                            } else {
                                seat2 = "d13";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            a14.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        a14.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "a14";
                            } else {
                                seat2 = "a14";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            b14.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        b14.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "b14";
                            } else {
                                seat2 = "b14";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            c14.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        c14.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "c14";
                            } else {
                                seat2 = "c14";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });


            d14.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        d14.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "d14";
                            } else {
                                seat2 = "d14";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            e1.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e1.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e1";
                            } else {
                                seat2 = "e1";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            e2.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e2.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "e2";
                            } else {
                                seat2 = "e2";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            e3.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e3.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e3";
                            } else {
                                seat2 = "e3";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            e4.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e4.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e4";
                            } else {
                                seat2 = "e4";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            e5.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e5.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e5";
                            } else {
                                seat2 = "e5";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            e6.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e6.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "e6";
                            } else {
                                seat2 = "e6";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            e7.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e7.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e7";
                            } else {
                                seat2 = "e7";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            e8.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e8.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e8";
                            } else {
                                seat2 = "e8";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            e9.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e9.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e9";
                            } else {
                                seat2 = "e9";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            e10.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e10.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "e10";
                            } else {
                                seat2 = "e10";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            e11.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e11.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e11";
                            } else {
                                seat2 = "e11";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            e12.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e12.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e12";
                            } else {
                                seat2 = "e12";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });

            e13.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e13.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals("")) {
                                seat1 = "e13";
                            } else {
                                seat2 = "e13";
                            }
                        } else {
                            numberOfCheckboxesChecked--;
                        }

                    }
                }
            });

            e14.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
                @Override
                public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
                    if (isChecked && numberOfCheckboxesChecked >= 2) {
                        e14.setChecked(false);
                    } else {
                        if (isChecked) {
                            numberOfCheckboxesChecked++;
                            if (seat1.equals(null)) {
                                seat1 = "e14";
                            } else {
                                seat2 = "e14";
                            }

                        } else {
                            numberOfCheckboxesChecked--;
                        }
                    }
                }
            });
        }

    }



    public void onCheckboxClicked(View view) {

        switch (view.getId()) {

            case R.id.ma:

                from = "Tilagor";
                at = "08:00";
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);


                break;

            case R.id.mb:

                from = "Baluchar Point";
                at = "08:05";
                m1.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.mc:


                from = "TV Gate";
                at = "08:10";
                m2.setChecked(false);
                m1.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.md:


                from = "Shahi Eidgah";
                at = "08:15";
                m2.setChecked(false);
                m3.setChecked(false);
                m1.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.me:

                from = "Amborkhana";
                at = "08:20";
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m1.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);


                break;

            case R.id.mf:

                from = "Jalalbad";
                at = "08:25";
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m1.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.mg:

                from = "Subid Bazar";
                at = "08:30";
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m1.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.mh:

                from = "Madina Market";
                at = "08:35";
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m1.setChecked(false);
                m9.setChecked(false);
                m10.setChecked(false);

                break;

            case R.id.mi:

                from = "Pathantula";
                at = "08:40";
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m1.setChecked(false);
                m10.setChecked(false);


                break;

            case R.id.mj:

                from = "Sust Gate";
                at = "08:45";
                m2.setChecked(false);
                m3.setChecked(false);
                m4.setChecked(false);
                m5.setChecked(false);
                m6.setChecked(false);
                m7.setChecked(false);
                m8.setChecked(false);
                m9.setChecked(false);
                m1.setChecked(false);

                break;

        }

    }

}