/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Game;

import java.util.ArrayList;



public class Jugador {
    private ArrayList<Carta> cartasJugador = new ArrayList<>();
    private double numOfWins = 0;
    private double equity;
    
    public Jugador(){
        
    }
    
    public void addCarta(Carta aux){
        cartasJugador.add(aux);
    }
    
    public void win(double a){
        numOfWins = numOfWins + a;
    }
    public ArrayList<Carta> getCartas(){
        return cartasJugador;
    }
    public void setWins(double a){
        numOfWins = a;
    }
    public void setEquity(double a){
        equity = a;
    }
    public double getWins(){
        return numOfWins;
    }
}
