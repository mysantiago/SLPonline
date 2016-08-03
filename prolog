subset([],[]).
subset([H|T],L) :- has(H,L),subset(T,L).
has(H,[H|_]).
has(H,[_|T]) :- has(H,T).

append([],X,X).
append([H|T], L, Z) :- append(T,[H|L],Z).