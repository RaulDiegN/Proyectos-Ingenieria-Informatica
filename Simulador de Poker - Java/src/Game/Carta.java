/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Game;


public class Carta {
    private int valor;
    private char palo;
    private boolean elegida;
    
    public Carta( char va, char color)  {
        valor = charToNumber(va);
        palo = color;
    }
    public Carta( int va, int color)  {
        valor = va;
        palo = numberToPalo(color);
    }
    
    public Carta( int va, char color)  {
        valor = va;
        palo = color;
    }
    
    public String toString(){
        return (Character.toString(numberToChar()) + Character.toString(palo));
    }
        
    public char numberToChar(){
        
        switch(valor){
            case 14: 
                return 'A';
            case 13:
                return 'K';
            case 12:
                return 'Q';
            case 11:
                return 'J';  
            case 10:
                return 'T';  
            case 9:
                return '9';  
            case 8:
                return '8';  
            case 7:
                return '7';  
            case 6:
                return '6';  
            case 5:
                return '5';  
            case 4:
                return '4';
            case 3:
                return '3';  
            case 2:
                return '2';  
        }     
        return '0';
    }
    
    private char numberToPalo(int va){
        
        switch(va){
            case 0: 
                return 'h';
            case 1:
                return 'd';
            case 2:
                return 's';
            default:
                return 'c';  
        }
    }
    
    public int paloToNumber(){
        
        switch(palo){
            case 'h': 
                return 0;
            case 'd':
                return 1;
            case 's':
                return 2;
            default:
                return 3;  
        }
    }
    
    private int charToNumber(char va){
        
        switch(va){
            case 'A': 
                return 14;
            case 'K':
                return 13;
            case 'Q':
                return 12;
            case 'J':
                return 11;  
            case 'T':
                return 10;  
            case '9':
                return 9;  
            case '8':
                return 8;  
            case '7':
                return 7;  
            case '6':
                return 6;  
            case '5':
                return 5;  
            case '4':
                return 4;
            case '3':
                return 3;  
            case '2':
                return 2;  
            default:
            	return -1;
        }
    }
    
    
    public boolean getElegida(){
        return elegida;
    }
    public void setElegida(boolean aux){
        elegida = aux;
    }
        
    public char getPalo(){
        return palo;
    }
        
     public int getValor() {
        return valor;
    }
    
}
