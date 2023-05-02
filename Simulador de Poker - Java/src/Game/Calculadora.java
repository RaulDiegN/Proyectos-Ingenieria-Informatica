/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Game;

import Exceptions.MyExceptions;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Calculadora {
    private ArrayList<Carta> cartas = new ArrayList<>();
    Jugador[] jugadores = new Jugador[6];
    boolean [] jugadoresSinFold = new boolean[6];

    private ArrayList<Carta> combination = new ArrayList<>();
    private int k;
    private int total = 0;
    
    public Calculadora(ArrayList<Carta> cartas, Jugador[] aux, ArrayList<Carta> cartasBoard, boolean[] foldean){
        this.cartas= new ArrayList(cartas);
        combination.addAll(cartasBoard);
        for(int i = 0; i < 6; i++)
            jugadoresSinFold[i] = foldean[i];
       
         for(int i  = 0; i < 6; i++){
            jugadores[i] = new Jugador();
        }
        jugadores = aux;
        switch(cartasBoard.size()){
            case 0:
                this.k=5;
                break;
            case 3:
                this.k=2;
                break;
             case 4:
                this.k=1;
                break; 
             case 5:
                this.k=0;
                break;
        }
    }
    
    public Jugador[] calcularEquity(int a){
        combinatoria(0, k);
        return jugadores;
    }
    
    public void combinatoria(int a, int b){
      /*Combinaciones de N elementos tomados en grupos de K. */  
        if (b == 0) {
           comprobar(combination);
            return;
         }
        for (int i = a; i < cartas.size(); ++i) {
            combination.add(cartas.get(i));
            combinatoria(i+1, b - 1);
            combination.remove(combination.size()-1);
        }
        

    }
    
    public void comprobar(ArrayList<Carta> cartas){
        total++;
        try {
            ArrayList<BestHand>  arrayJugadores = new ArrayList<>();
            for(int i = 0; i < 6 ; i++){
                if(!jugadoresSinFold[i]){
                    MejorManoJugador juego;
                    juego = new MejorManoJugador(cartas, jugadores[i].getCartas());
                    juego.mejorMano();
                    BestHand mejormano = new BestHand(juego.getGanadoras(), juego.getValorMano());
                    arrayJugadores.add(mejormano);

                }
                else{
                    BestHand mejormano = new BestHand( null , null);
                    arrayJugadores.add(mejormano);
                }
            }
            int pos = 0, sizeEmpates = 0;
            int [] empates = new int[6]; 
            
            boolean empate = false;
            for(int i = 1; i < 6; i++){
                if(!jugadoresSinFold[i]){
                    if(arrayJugadores.get(pos).getValorMano().getCalidad() < arrayJugadores.get(i).getValorMano().getCalidad()){
                        pos = i;
                        empate = false;
                        sizeEmpates = 0;

                    }

                    else if(arrayJugadores.get(pos).getValorMano().getCalidad() == arrayJugadores.get(i).getValorMano().getCalidad()){

                            switch(arrayJugadores.get(pos).getValorMano()){
                                case HIGHCARD:
                                    if(arrayJugadores.get(pos).getGanadora().get(0).getValor() < arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                          pos = i;
                                          empate = false;
                                          sizeEmpates = 0;
                                    }


                                    else if(arrayJugadores.get(pos).getGanadora().get(0).getValor() == arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        int j = 1;
                                        boolean encontrado = false;
                                        while(j < 5 && !encontrado){
                                            if(arrayJugadores.get(pos).getGanadora().get(j).getValor() < arrayJugadores.get(i).getGanadora().get(j).getValor()){
                                                pos = i;
                                                empate = false;
                                                sizeEmpates = 0;
                                                encontrado = true;
                                            }
                                            else if(arrayJugadores.get(pos).getGanadora().get(j).getValor() > arrayJugadores.get(i).getGanadora().get(j).getValor()){

                                                    encontrado = true;
                                            }
                                            j++;
                                        }
                                        if(!encontrado){
                                            empate = true;
                                            if(sizeEmpates == 0){
                                                empates[sizeEmpates] = pos;
                                                sizeEmpates++;
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                            else{
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                        }
                                    }
                                    break;
                                case PAIR:
                                     if(arrayJugadores.get(pos).getGanadora().get(0).getValor() < arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                          pos = i;
                                          empate = false;
                                          sizeEmpates = 0;
                                    }

                                     else if(arrayJugadores.get(pos).getGanadora().get(0).getValor() == arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        int j = 2;
                                        boolean encontrado = false;
                                        while(j < 5 && !encontrado){
                                            if(arrayJugadores.get(pos).getGanadora().get(j).getValor() < arrayJugadores.get(i).getGanadora().get(j).getValor()){
                                                pos = i;
                                                empate = false;
                                                sizeEmpates = 0;
                                                encontrado = true;
                                            }
                                            else if(arrayJugadores.get(pos).getGanadora().get(j).getValor() > arrayJugadores.get(i).getGanadora().get(j).getValor()){

                                                    encontrado = true;
                                            }
                                            j++;
                                        }
                                        if(!encontrado){
                                            empate = true;
                                            if(sizeEmpates == 0){
                                                empates[sizeEmpates] = pos;
                                                sizeEmpates++;
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                            else{
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                        }
                                    }
                                    break;
                                case TWOPAIR:
                                     if(arrayJugadores.get(pos).getGanadora().get(0).getValor() < arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                          pos = i;
                                          empate = false;
                                          sizeEmpates = 0;
                                    }
                                     else if(arrayJugadores.get(pos).getGanadora().get(0).getValor() == arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        int j = 2;
                                        boolean encontrado = false;
                                        while(j < 5 && !encontrado){
                                            if(arrayJugadores.get(pos).getGanadora().get(j).getValor() < arrayJugadores.get(i).getGanadora().get(j).getValor()){
                                                pos = i;
                                                empate = false;
                                                sizeEmpates = 0;
                                                encontrado = true;
                                            }
                                            else if(arrayJugadores.get(pos).getGanadora().get(j).getValor() > arrayJugadores.get(i).getGanadora().get(j).getValor()){

                                                    encontrado = true;
                                            }
                                            j++;
                                        }
                                        if(!encontrado){
                                            empate = true;
                                            if(sizeEmpates == 0){
                                                empates[sizeEmpates] = pos;
                                                sizeEmpates++;
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                            else{
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                        }
                                    }
                                    break;
                                case THREE:
                                     if(arrayJugadores.get(pos).getGanadora().get(0).getValor() < arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                          pos = i;
                                          empate = false;
                                          sizeEmpates = 0;
                                    }
                                     else if(arrayJugadores.get(pos).getGanadora().get(0).getValor() == arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        int j = 3;
                                        boolean encontrado = false;
                                        while(j < 5 && !encontrado){
                                            if(arrayJugadores.get(pos).getGanadora().get(j).getValor() < arrayJugadores.get(i).getGanadora().get(j).getValor()){
                                                pos = i;
                                                empate = false;
                                                sizeEmpates = 0;
                                                encontrado = true;
                                            }
                                            else if(arrayJugadores.get(pos).getGanadora().get(j).getValor() > arrayJugadores.get(i).getGanadora().get(j).getValor()){
                                                    encontrado = true;
                                            }
                                            j++;
                                        }
                                        if(!encontrado){
                                            empate = true;
                                            if(sizeEmpates == 0){
                                                empates[sizeEmpates] = pos;
                                                sizeEmpates++;
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                            else{
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                        }
                                    }
                                    break;
                                case STRAIGHT:
                                    if(arrayJugadores.get(pos).getGanadora().get(0).getValor() < arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        pos = i;
                                        empate = false;
                                        sizeEmpates = 0;
                                    }

                                    else if(arrayJugadores.get(pos).getGanadora().get(0).getValor() == arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        empate = true;
                                        if(sizeEmpates == 0){
                                            empates[sizeEmpates] = pos;
                                            sizeEmpates++;
                                            empates[sizeEmpates] = i;
                                            sizeEmpates++;
                                        }
                                        else{
                                            empates[sizeEmpates] = i;
                                            sizeEmpates++;
                                        }
                                    }
                                    break;
                                case FLUSH:
                                    if(arrayJugadores.get(pos).getGanadora().get(0).getValor() < arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                          pos = i;
                                          empate = false;
                                          sizeEmpates = 0;
                                    }

                                    else if(arrayJugadores.get(pos).getGanadora().get(0).getValor() == arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        int j = 1;
                                        boolean encontrado = false;
                                        while(j < 5 && !encontrado){
                                            if(arrayJugadores.get(pos).getGanadora().get(j).getValor() < arrayJugadores.get(i).getGanadora().get(j).getValor()){
                                                pos = i;
                                                empate = false;
                                                sizeEmpates = 0;
                                                encontrado = true;
                                            }
                                            else if(arrayJugadores.get(pos).getGanadora().get(j).getValor() > arrayJugadores.get(i).getGanadora().get(j).getValor()){
                                                    encontrado = true;
                                            }
                                            j++;
                                        }
                                        if(!encontrado){
                                            empate = true;
                                            if(sizeEmpates == 0){
                                                empates[sizeEmpates] = pos;
                                                sizeEmpates++;
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                            else{
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                        }
                                    }
                                    break;
                                case FULLHOUSE:
                                    if(arrayJugadores.get(pos).getGanadora().get(0).getValor() < arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                          pos = i;
                                          empate = false;
                                          sizeEmpates = 0;
                                    }

                                    else if(arrayJugadores.get(pos).getGanadora().get(0).getValor() == arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        int j = 2;
                                        boolean encontrado = false;
                                        while(j < 5 && !encontrado){
                                            if(arrayJugadores.get(pos).getGanadora().get(j).getValor() < arrayJugadores.get(i).getGanadora().get(j).getValor()){
                                                pos = i;
                                                empate = false;
                                                sizeEmpates = 0;
                                                encontrado = true;
                                            }
                                            else if(arrayJugadores.get(pos).getGanadora().get(j).getValor() > arrayJugadores.get(i).getGanadora().get(j).getValor()){
                                                    encontrado = true;
                                            }
                                            j++;
                                        }
                                        if(!encontrado){
                                            empate = true;
                                            if(sizeEmpates == 0){
                                                empates[sizeEmpates] = pos;
                                                sizeEmpates++;
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                            else{
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                        }
                                    }
                                    break;
                                case POKER:
                                    if(arrayJugadores.get(pos).getGanadora().get(0).getValor() < arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                          pos = i;
                                          empate = false;
                                          sizeEmpates = 0;
                                    }

                                    else if(arrayJugadores.get(pos).getGanadora().get(0).getValor() == arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        if(arrayJugadores.get(pos).getGanadora().get(4).getValor() < arrayJugadores.get(i).getGanadora().get(4).getValor()){
                                          pos = i;
                                          empate = false;
                                          sizeEmpates = 0;
                                        }

                                        else if(arrayJugadores.get(pos).getGanadora().get(4).getValor() == arrayJugadores.get(i).getGanadora().get(4).getValor()){
                                            empate = true;

                                            if(sizeEmpates == 0){
                                                empates[sizeEmpates] = pos;
                                                sizeEmpates++;
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                            else{
                                                empates[sizeEmpates] = i;
                                                sizeEmpates++;
                                            }
                                         }
                                    }
                                    break;
                                case STRAIGHTFLUSH:
                                    if(arrayJugadores.get(pos).getGanadora().get(0).getValor() < arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                          pos = i;
                                          empate = false;
                                          sizeEmpates = 0;
                                    }
                                    else if(arrayJugadores.get(pos).getGanadora().get(0).getValor() == arrayJugadores.get(i).getGanadora().get(0).getValor()){
                                        empate = true;
                                        if(sizeEmpates == 0){
                                            empates[sizeEmpates] = pos;
                                            sizeEmpates++;
                                            empates[sizeEmpates] = i;
                                            sizeEmpates++;
                                        }
                                        else{
                                            empates[sizeEmpates] = i;
                                            sizeEmpates++;
                                        }
                                    }
                                    break;
                            }
                    }
                }
            }
            if(!empate){
                jugadores[pos].win(1);
            }
            else{
                
                double numeroEquity = (double)Math.round((1/sizeEmpates) * 1000d) / 1000d;
                for(int i = 0; i < sizeEmpates; i++){
                  
                   jugadores[empates[i]].win(numeroEquity);
                }
            }

        } catch (MyExceptions ex) {
                Logger.getLogger(Calculadora.class.getName()).log(Level.SEVERE, null, ex);
            }
    }
    
    public int getTotal(){
        return total;
    }
}
