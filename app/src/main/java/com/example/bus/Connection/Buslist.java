package com.example.bus.Connection;

import android.util.Log;

public class Buslist {
    private String route;
    private String busid;
    private String seatcount;
    private String bookedseats;
    private String driverid;
    private String time;
    private String date;

    public Buslist(String route, String busid, String seatcount, String bookedseats, String driverid, String time, String date) {
        this.route = route;
        this.busid = busid;
        this.seatcount = seatcount;
        this.bookedseats = bookedseats;
        this.driverid = driverid;
        this.time = time;
        this.date = date;
        Log.d("s", route);
    }

    public String getRoute() {
        return route;
    }

    public String getBusid() {
        return busid;
    }

    public String getSeatcount() {
        return seatcount;
    }

    public String getBookedseats() {
        return bookedseats;
    }

    public String getDriverid() {
        return driverid;
    }

    public String getTime() {
        return time;
    }

    public String getDate() {
        return date;
    }
}
