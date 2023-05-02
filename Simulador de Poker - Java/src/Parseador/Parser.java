/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Parseador;

import Game.Carta;



public class Parser {
    
    Carta[][] cartasBaraja = new Carta[13][4];
    
    public Parser(){

        for(int i = 0; i < 13; i++){
            for(int j = 0; j < 4; j++){
                cartasBaraja[i][j] = new Carta(i + 2,j);
            }
        }
    }
    
    public Carta[][] getCartas(){
        return cartasBaraja;
    }
}
