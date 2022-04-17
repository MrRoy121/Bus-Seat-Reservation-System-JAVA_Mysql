package com.example.bus.Connection;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.example.bus.R;

import java.util.List;

public class History_Adapter extends RecyclerView.Adapter<History_Adapter.ProductViewHolder> {

    private Context mCtx;
    private List<History> historyList;
    private OnItemClickListener mListener;



    public interface OnItemClickListener {
        void onItemClick(int position);
    }
    public void setOnItemClickListener(OnItemClickListener listener) {
        mListener = listener;
    }
    public History_Adapter(Context mCtx, List<History> historyList) {
        this.mCtx = mCtx;
        this.historyList = historyList;
    }

    @Override
    public ProductViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.bushistory, null);
        return new ProductViewHolder(view);
    }

    @Override
    public void onBindViewHolder(ProductViewHolder holder, int position) {
        History history = historyList.get(position);


        holder.t1.setText(history.getTime());
        holder.t2.setText(history.getDate());
        holder.t3.setText(history.getBusid());
        holder.t4.setText(history.getSeat());
        holder.t5.setText(history.getFrom());

    }

    @Override
    public int getItemCount() {
        return historyList.size();
    }

    class ProductViewHolder extends RecyclerView.ViewHolder {

        TextView t1, t2, t3, t4,  t5, t6;


        public ProductViewHolder(View itemView) {
            super(itemView);

            t1 = itemView.findViewById(R.id.histime);
            t2 = itemView.findViewById(R.id.hisdate);
            t3 = itemView.findViewById(R.id.hisbusid);
            t4 = itemView.findViewById(R.id.hiss1);
            t5 = itemView.findViewById(R.id.hisp);

            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    if (mListener != null) {
                        int position = getAdapterPosition();
                        if (position != RecyclerView.NO_POSITION) {
                            mListener.onItemClick(position);
                        }
                    }
                }
            });
        }
    }
}
