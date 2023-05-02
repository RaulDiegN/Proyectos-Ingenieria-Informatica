/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Game;

import java.util.ArrayList;

/**
 *
 * @author rauldiego
 */
public class BestHand {
    
    private ArrayList<Carta> ganadora = new ArrayList<>();
    private ValorMano value;
    
    public BestHand(ArrayList<Carta> a, ValorMano b){
        ganadora = a;
        value = b;
    }
    
    public ValorMano getValorMano(){
        return value;
    }
    public ArrayList<Carta> getGanadora(){
        return ganadora;
    }

}
