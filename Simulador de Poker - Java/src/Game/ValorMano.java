/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Game;

/**
 *
 * @author rauldiego
 */
public enum ValorMano {
    HIGHCARD(0),
    PAIR(1),
    TWOPAIR(2),
    THREE(3),
    STRAIGHT(4),
    FLUSH(5),
    FULLHOUSE(6),
    POKER(7),
    STRAIGHTFLUSH(8);
    
    
    private int calidad;
    private boolean draw[] = { false, false};
    
    ValorMano (int calidad) { 
        this.calidad = calidad;
    }
    public int getCalidad() {
 	   return this.calidad;
    }
    
    public boolean getDrawS(){
        return draw[0];
    }
    public boolean getDrawF(){
        return draw[1];
    }
    public void setDrawS(boolean aux){
        draw[0] = aux;
    }
    public void setDrawF(boolean aux){
        draw[1] = aux;
    }
}
