/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Game;

import Exceptions.MyExceptions;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.List;

/**
 *
 * @author rauldiego
 */
public class MejorManoJugador {
    
    
    private List<Carta> cartasJugador = new ArrayList<>();
    private List<Carta> cartasBoard = new ArrayList<>();
    private ArrayList<Carta> cartasGanadoras = new ArrayList<>();
    private ValorMano value = ValorMano.HIGHCARD;

    
    public MejorManoJugador(List<Carta>  cartas,  List<Carta> cartaJugador) throws MyExceptions {
    
		
        this.cartasBoard = new ArrayList<>();
        for(int i = 0; i < cartas.size(); i++){
           this.cartasBoard.add(cartas.get(i));
        }
        cartasBoard.add(cartaJugador.get(0));
        cartasBoard.add(cartaJugador.get(1));
        cartasBoard.sort((Carta c1, Carta c2) -> new Integer(c2.getValor()).compareTo(new Integer(c1.getValor())));
        this.cartasJugador = cartaJugador;
         cartasJugador.sort((Carta c1, Carta c2) -> new Integer(c2.getValor()).compareTo(new Integer(c1.getValor())));
    }
    
    public void mejorMano(){
    	
    	int cont = 0;
    
        if(flush()){  // Si tengo color....
            
            if(straightFlush()){ // y ademas escalera....
                value = ValorMano.STRAIGHTFLUSH;
            }
            else{
                value = ValorMano.FLUSH;
                
                
            }
        }
        
        else{	//SI no tengo color compruebo lo demas
        	
            if(straight()){  // Si tengo escalera...
                value = ValorMano.STRAIGHT;
                 
            }
            
            else{ // SI no tengo escalera miro el resto...
            	
                this.cartasGanadoras = new ArrayList<>();
                
                for(int i = 0; i < this.cartasBoard.size() - 1; i++){
                	
                     switch(value){
                     
                case HIGHCARD: // Si llevo carta alta...
                    if(pair(this.cartasBoard.get(i).getValor(),this.cartasBoard.get(i + 1).getValor() )){
                        value = ValorMano.PAIR;
                        
                        this.cartasGanadoras.add(this.cartasBoard.get(i));
                        this.cartasGanadoras.add(this.cartasBoard.get(i + 1));
                        cont = 0;
                    }
                    
                    break;
                    
                case PAIR: // Si llevo una pareja... y justo lo anterior era pareja
                    if(pair(this.cartasBoard.get(i).getValor(),this.cartasBoard.get(i + 1).getValor()) && cont == 1 ){
                        value = ValorMano.THREE;
                       
                        this.cartasGanadoras.add(this.cartasBoard.get(i+1));
                
                    } // si lo anterior no era una pareja....
                    else if(pair(this.cartasBoard.get(i).getValor(),this.cartasBoard.get(i + 1).getValor())){
                        value = ValorMano.TWOPAIR;
                       
                        this.cartasGanadoras.add(this.cartasBoard.get(i));
                        this.cartasGanadoras.add(this.cartasBoard.get(i + 1));
                    }
                    
                    break;
                    
                case TWOPAIR:
                    		// SI llevo una doble pareja....
                    if(pair(this.cartasBoard.get(i).getValor(),this.cartasBoard.get(i + 1).getValor())
                            && pair(this.cartasBoard.get(i).getValor(),this.cartasBoard.get(i - 1).getValor())){
                        this.cartasGanadoras.add(this.cartasBoard.get(i + 1));
                         if(i < cartasBoard.size() - 2  && pair(cartasBoard.get(i + 2).getValor(),cartasBoard.get(i + 1).getValor())){
                            value = ValorMano.POKER;
                            this.cartasGanadoras = new ArrayList<>();
                            this.cartasGanadoras.add(cartasBoard.get(i - 1));
                            this.cartasGanadoras.add(cartasBoard.get(i));
                            this.cartasGanadoras.add(cartasBoard.get(i + 1));
                            this.cartasGanadoras.add(cartasBoard.get(i + 2));
                        }
                        else{
                            value = ValorMano.FULLHOUSE;
                            this.cartasGanadoras.add(cartasBoard.get(i + 1));
                        }
                    }                    
                    break;
                case THREE:
                    	//SI por la carta justo anterior tenia un trio....
                     if(pair(this.cartasBoard.get(i).getValor(),this.cartasBoard.get(i + 1).getValor()) && cont == 2 ){
                        value = ValorMano.POKER;
                       
                        this.cartasGanadoras.add(this.cartasBoard.get(i + 1));
                    }
                     // Si tenia un trio acumulado, y la de ahora es igual a la siguiente....
                     else if(pair(this.cartasBoard.get(i).getValor(),this.cartasBoard.get(i + 1).getValor())){
                         if(i < cartasBoard.size() - 3 && pair(this.cartasBoard.get(i + 1).getValor(),this.cartasBoard.get(i + 2).getValor()) &&pair(this.cartasBoard.get(i + 2).getValor(),this.cartasBoard.get(i + 3).getValor())){
                             value = ValorMano.POKER;
                            this.cartasGanadoras = new ArrayList<>();
                            this.cartasGanadoras.add(cartasBoard.get(i));
                            this.cartasGanadoras.add(cartasBoard.get(i + 1));
                            this.cartasGanadoras.add(cartasBoard.get(i + 2));
                            this.cartasGanadoras.add(cartasBoard.get(i + 3));
                         }
                         else{
                            value = ValorMano.FULLHOUSE;

                            this.cartasGanadoras.add(this.cartasBoard.get(i));
                            this.cartasGanadoras.add(this.cartasBoard.get(i + 1));
                         }
                     }
                    
                    break;
                    
                default:
                    
            }
                     cont++; //Si vale 0, significa que ha habido minimo una carta en mitad "sin valor"
                }
            }
        }
        ganadoras();
     }
    
    public void ganadoras(){
    	
         for(int i = 0; i < this.cartasBoard.size(); i++){ // si no tenia 5 cartas, relleno con las mas altas
            if(this.cartasGanadoras.size() < 5 && !this.cartasGanadoras.contains(this.cartasBoard.get(i))){
                    this.cartasGanadoras.add(this.cartasBoard.get(i));
            }
        }
    }
    
    public boolean pair(int a , int b){
        return (a == b);
    }
            
    public boolean flush(){
    	int hearts = 0, spades = 0, clubs = 0, daimonds = 0;
        
        for(int i = 0; i < this.cartasBoard.size(); i++){
             switch (this.cartasBoard.get(i).getPalo()) {
                case 'h':
                    hearts++;
                    break;
                case 'd':
                    daimonds++;
                    break;
                case 'c':
                    clubs++;
                    break;
                case 's':
                    spades++;
                    break;
                default:
                    break;
            }
        }
          if(hearts >= 5){
              this.cartasFlush('h');
              return true;
          }
          else  if(clubs >= 5){
              this.cartasFlush('c');
              return true;
           }
           else  if(daimonds >= 5){
               this.cartasFlush('s');
               return true;
            }
            else if(spades >= 5){
               this.cartasFlush('d');
               return true;
            }
        return false;
    }
    
    public boolean straightFlush(){
    	
        int straight = 0, auxiliar = 0;
        ArrayList<Carta> aux1 = new ArrayList<>();
        ArrayList<Carta> aux2 = new ArrayList<>();
        
        for(int i = 0; i < this.cartasGanadoras.size() - 1; i++){
        	
            if(this.cartasGanadoras.get(i).getValor()- 1 == this.cartasGanadoras.get(i + 1).getValor()){
                auxiliar++;
                if(!aux1.isEmpty()){
                      aux1.add(this.cartasGanadoras.get(i + 1));
                  }
                  else{
                      aux1.add(this.cartasGanadoras.get(i));
                      aux1.add(this.cartasGanadoras.get(i + 1));
                  }
            }
            else if(this.cartasGanadoras.get(i).getValor()!= this.cartasGanadoras.get(i + 1).getValor()){
                  if(straight < auxiliar){
                      straight = auxiliar;
                      aux2 = aux1;
                      
                  }
                  auxiliar = 0;
                  aux1 = new ArrayList<>();
              }
          }
           if(straight < auxiliar){
                      straight = auxiliar;
                      aux2 = aux1;
                      
                  }

          switch(straight){
              
              case 6:
                  aux2.remove(aux2.size()- 1);
                  aux2.remove(aux2.size()- 1);
                  this.cartasGanadoras = aux2;
                  return true;
              case 5:
                  aux2.remove(aux2.size()- 1);
                  this.cartasGanadoras = aux2;
                  return true;
              case 4:
                  this.cartasGanadoras = aux2;
                  return true;
              case 3:
                  if(comprobacion() == 5){
                      this.cartasGanadoras = aux2;
                      return true;
                  }
                  
                break;
            
          }
          return false;
    }
    
    public boolean straight(){
       int straight = 0, auxiliar = 0;
       ArrayList<Carta> aux1 = new ArrayList<>();
       ArrayList<Carta> aux2 = new ArrayList<>();
          for(int i = 0; i < this.cartasBoard.size() - 1; i++){
              if(this.cartasBoard.get(i).getValor()- 1 == this.cartasBoard.get(i + 1).getValor()){
                  auxiliar++;
                  if(!aux1.isEmpty()){
                      aux1.add(this.cartasBoard.get(i + 1));
                  }
                  else{
                      aux1.add(this.cartasBoard.get(i));
                      aux1.add(this.cartasBoard.get(i + 1));
                  }
              }
              else if(this.cartasBoard.get(i).getValor()!= this.cartasBoard.get(i + 1).getValor()){
                  if(straight < auxiliar){
                      straight = auxiliar;
                      aux2 = aux1;
                  }
                  auxiliar = 0;
                  aux1 = new ArrayList<>();
              }
          }
          if(straight < auxiliar){
                      straight = auxiliar;
                      aux2 = aux1;
                  }
 

          switch(straight){
              case 6:
                  aux2.remove(aux2.size()- 1);
                  aux2.remove(aux2.size()- 1);
                  this.cartasGanadoras = aux2;
                  return true;
              case 5:
                  aux2.remove(aux2.size()- 1);
                  this.cartasGanadoras = aux2;
                  return true;
              case 4:
                  this.cartasGanadoras = aux2;
                  return true;
              case 3:
                  if(comprobacion() == 5){
                      this.cartasGanadoras = aux2;
                      return true;
                  }
                  
                break;
          }
          return false;
    }
    
    
    public int comprobacion(){
        
        boolean As = false, ci = false, cu= false, tr = false, ds = false;
        int straight = 0;
        for(int i = 0; i < this.cartasBoard.size(); i++){
        
         switch(this.cartasBoard.get(i).getValor()){
              
            case 14:
                  As = true;
                  break;
            case 5:
                  ci = true;
                  break;
            case 4:
                  cu = true;
                  break;
            case 3:
                   tr = true;
                   break;
            case 2:
                   ds = true;
                   break;
              
          }
        }
        
        if(As)
            straight++;
        if(ci)
            straight++;
        if(cu)
            straight++;
        if(tr)
            straight++;
        if(ds)
            straight++;
        
        return straight;
    }
    
    public String toString() {
    	String salida = "";
    	for (int i = 0; i<cartasBoard.size(); i++)
    		salida = salida + " "+cartasBoard.get(i).toString();
		return salida;
    	
    }
    public String highCard(){
        return this.cartasBoard.get(0).toString();
    }
    
    
    public String mostrarCartasBoard(){
        String aux = "";
        
        for(int i = 0; i < this.cartasJugador.size(); i++){
            aux = aux + this.cartasJugador.get(i).toString();
        }
        aux = aux + ";" + Integer.toString(this.cartasBoard.size() - 2) + ";";
        for(int i = 0; i < this.cartasBoard.size(); i++){
            if(this.cartasBoard.get(i) != this.cartasJugador.get(0) && 
                    this.cartasBoard.get(i) != this.cartasJugador.get(1))
                    aux = aux + this.cartasBoard.get(i).toString();
        }
        
        return aux;
    }
    public void cartasFlush(char aux){
        for(int i = 0; i < this.cartasBoard.size(); i++){
            if(this.cartasBoard.get(i).getPalo() == aux)
                    this.cartasGanadoras.add(this.cartasBoard.get(i));
        }
    }
    public String mostrarCartasGanadoras(){
        String aux = "";
        for(int i = 0; i < this.cartasGanadoras.size(); i++){
            aux = aux + this.cartasGanadoras.get(i).toString();
        }
        return aux;
    }
    
    public ArrayList<Carta> getGanadoras(){
        return cartasGanadoras;
    }
    
    public ValorMano getValorMano(){
        
        return this.value;
    }
}

